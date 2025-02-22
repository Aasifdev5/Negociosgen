@extends('admin.Master')

@section('title')
    {{ $title }}
@endsection

@section('content')

<!-- Styles & Scripts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.repeater@1.2.1/jquery.repeater.min.js"></script>

<!-- Page Content Start -->
<div class="page-body">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('Application Settings') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ url('admin/dashboard') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __($title) }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar -->
                <div class="card col-lg-3 col-md-4">
                    @include('admin.application_settings.sidebar')
                </div>

                <!-- Main Content -->
                <div class="col-lg-9 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h2>{{ __($title) }}</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('settings.support-ticket.question.update') }}" method="POST">
                                @csrf

                                <div id="add_repeater">
                                    <div data-repeater-list="question_answers">
                                        @forelse ($supportTickets as $question)
                                            <div data-repeater-item class="form-group row border p-3 rounded shadow-sm bg-light mb-3">
                                                <input type="hidden" name="question_answers[{{ $loop->index }}][id]" value="{{ $question->id }}"/>

                                                @foreach (appLanguages() as $locale)
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="font-weight-bold text-primary">
                                                            {{ __('Question') }} ({{ strtoupper($locale->language) }})
                                                        </label>
                                                        <input type="text"
                                                               name="question_answers[{{ $loop->parent->index }}][question][{{ $locale->iso_code }}]"
                                                               value="{{ $question->getTranslation('question', $locale->iso_code) ?? '' }}"
                                                               class="form-control border border-primary"
                                                               required>
                                                    </div>

                                                    <div class="col-lg-6 mb-3">
                                                        <label class="font-weight-bold text-success">
                                                            {{ __('Answer') }} ({{ strtoupper($locale->language) }})
                                                        </label>
                                                        <textarea name="question_answers[{{ $loop->parent->index }}][answer][{{ $locale->iso_code }}]"
                                                                  class="form-control border border-success"
                                                                  required>{{ $question->getTranslation('answer', $locale->iso_code) ?? '' }}</textarea>
                                                    </div>
                                                @endforeach

                                                <div class="col-12 mt-2 text-end">
                                                    <a href="javascript:;" data-repeater-delete class="btn btn-danger">
                                                        <i class="fas fa-trash"></i> {{ __('Remove') }}
                                                    </a>
                                                </div>
                                            </div>
                                        @empty
                                            <!-- Empty state for repeater -->
                                            <p class="text-muted">{{ __('No support ticket questions found.') }}</p>
                                        @endforelse
                                    </div>

                                    <div class="mt-3">
                                        <a href="javascript:;" data-repeater-create class="btn btn-primary">
                                            <i class="fas fa-plus"></i> {{ __('Add Question') }}
                                        </a>
                                    </div>
                                </div>

                                <div class="row justify-content-end mt-4">
                                    <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Repeater -->
<script>
(function($) {
    "use strict";

    $(document).ready(function() {
        let repeater = $('#add_repeater').repeater({
            initEmpty: false,
            show: function() {
                $(this).slideDown();
            },
            hide: function(deleteElement) {
                if (confirm("Are you sure you want to delete this question?")) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function(setIndexes) {
                // Ensure indexes are set correctly
            },
            // Define the template for new items
            repeaters: [{
                selector: '#add_repeater',
                defaultValues: {},
                fields: [
                    @foreach (appLanguages() as $locale)
                    {
                        name: 'question_answers[][question][{{ $locale->iso_code }}]',
                        type: 'text',
                        className: 'form-control border border-primary'
                    },
                    {
                        name: 'question_answers[][answer][{{ $locale->iso_code }}]',
                        type: 'textarea',
                        className: 'form-control border border-success'
                    },
                    @endforeach
                    {
                        name: 'question_answers[][id]',
                        type: 'hidden'
                    }
                ]
            }]
        });

        // Custom handler for add button if needed
        $('[data-repeater-create]').on('click', function() {
            repeater.addItem();
        });
    });
})(jQuery);
</script>

@endsection
