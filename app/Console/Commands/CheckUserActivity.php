<?php

namespace App\Console\Commands;

use App\Models\Balance;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CheckUserActivity extends Command
{
    // Command signature
    protected $signature = 'usuarios:verificar-actividad';

    // Command description
    protected $description = 'Asegurarse de que todos los usuarios activos refieran a alguien cada mes.';

    public function handle()
    {
        $this->info('Iniciando la verificación de actividad de usuarios.');

        // Retrieve all subscribed users
        $usuarios = DB::table('users')
            ->where('is_subscribed', 1)->where('is_active',1)
            ->get();

        foreach ($usuarios as $usuario) {
            // Check referrals for the current month
            $referidosContados = DB::table('users')
                ->where('refer', $usuario->id)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count();

            if ($referidosContados === 0) {
                // Mark user as inactive if no referrals were made
                $this->marcarUsuarioInactivo($usuario, false);
            } else {
                $this->info("El usuario {$usuario->id} tiene {$referidosContados} referidos este mes.");
            }
        }

        $this->info('La verificación de actividad de usuarios se completó.');
    }

    private function marcarUsuarioInactivo($usuario, $activado)
    {
        if ($usuario->balance >= 100) {
            // Deduct 100 from balance and mark as inactive
            DB::table('users')
                ->where('id', $usuario->id)
                ->update([
                    'balance' => $usuario->balance - 100,
                    'is_subscribed' => 1,
                ]);
                 // Update the balance in the `balance` table
            $balance = Balance::where('user_id', $usuario->id)->first();



            $balance->amount -= 100;
            $balance->save();

            $this->info("El usuario {$usuario->id} ha sido marcado como inactivo y se dedujeron 100Bs.");
            $this->notificarUsuario($usuario, false, true);
        } else {
            // Mark as inactive without deduction
            DB::table('users')
                ->where('id', $usuario->id)
                ->update(['is_subscribed' => 0, 'is_active' => 0]);

            $this->info("El usuario {$usuario->id} ha sido marcado como inactivo debido a saldo insuficiente.");
            $this->notificarUsuario($usuario, false, false);
        }
    }

    private function notificarUsuario($usuario, $activado, $deducido)
    {
        if ($deducido) {
            // Email for deduction and deactivation
            $mensajeCorreo = 'Tu cuenta ha sido desactivada. Se dedujeron 100Bs de tu saldo. Para permanecer activo, refiere al menos a un usuario este mes.';
        } else {
            // Email for no deduction and no activity
            $mensajeCorreo = 'Tu cuenta ha sido desactivada. No referiste a nadie este mes. Para permanecer activo, refiere al menos a un usuario este mes.';
        }

        // Send email
        Mail::raw($mensajeCorreo, function ($message) use ($usuario) {
            $message->to($usuario->email)
                    ->subject('Estado de tu cuenta');
        });

        $this->info("Se envió un correo al usuario {$usuario->id}.");
    }
}
