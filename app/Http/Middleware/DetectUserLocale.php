<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Stevebauman\Location\Facades\Location;

class DetectUserLocale
{
    public function handle(Request $request, Closure $next)
    {
        // 1. If the user has already manually selected a language, use it
        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
            return $next($request);
        }

        // 2. Detect user's location-based language
        $ip = $request->ip();
        if ($this->isPrivateIP($ip)) {
            $countryCode = 'US'; // Default fallback
        } else {
            $countryCode = $this->getCountryCode($ip);
        }

        // 3. Define default languages based on country codes
        $languageMap = [
            'BO' => 'es', // Bolivia -> Spanish
            'BR' => 'pt', // Brazil -> Portuguese
            'US' => 'gb', // USA -> English
            'FR' => 'fr', // France -> French
            // Add more mappings as needed
        ];

        // 4. Apply language only if it's in the mapping
        if ($countryCode && isset($languageMap[$countryCode])) {
            $locale = $languageMap[$countryCode];
            session(['locale' => $locale]); // Store in session
            app()->setLocale($locale); // Set the app locale
        }

        return $next($request);
    }

    private function isPrivateIP($ip)
    {
        return filter_var(
            $ip,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
        ) === false;
    }

    private function getCountryCode($ip)
    {
        // Try getting location using Stevebauman\Location
        $location = Location::get($ip);
        if ($location && isset($location->countryCode)) {
            return strtoupper($location->countryCode);
        }

        // Fallback to external API
        try {
            $response = Http::timeout(10)->retry(3, 200)->get("http://ip-api.com/json/{$ip}");
            $data = $response->json();

            if ($response->successful() && isset($data['countryCode'])) {
                return strtoupper($data['countryCode']);
            }
        } catch (\Exception $e) {
            \Log::error("IP lookup failed: " . $e->getMessage());
        }

        return null;
    }
}
