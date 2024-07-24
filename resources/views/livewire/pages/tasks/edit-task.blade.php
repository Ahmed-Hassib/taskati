<div>
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">{{ Str::ucfirst(__('edit task')) }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            {{ Breadcrumbs::render('edit-task', $form->task) }}
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('dist/images/breadcrumb/ChatBc.png') }}" alt=""
                            class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tasks-container">
        <form wire:submit="save" id="editTaskForm">
            <div class="m-auto row justify-content-start align-items-center" style="max-width: 450px">
                <div class="col-12">
                    <div class="form-floating mb-3">
                        <input type="text" @class([
                            'form-control',
                            'is-invalid' => $errors->has('form.task_name'),
                            'is-invalid-left' => app()->getLocale() == 'ar',
                        ]) id="task_name" name="task_name"
                            placeholder="task name" wire:model.live="form.task_name">
                        <label for="task_name">{{ Str::ucfirst(trans('tasks.task name')) }}</label>
                        @error('form.task_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="date" @class([
                            'form-control',
                            'is-invalid' => $errors->has('form.start_date'),
                            'is-invalid-left' => app()->getLocale() == 'ar',
                        ]) id="start_date" name="start_date"
                            placeholder="start date" wire:model.live="form.start_date">
                        <label for="start_date">{{ Str::ucfirst(trans('tasks.start at')) }}</label>
                        @error('form.start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="date" @class([
                            'form-control',
                            'is-invalid' => $errors->has('form.end_date'),
                            'is-invalid-left' => app()->getLocale() == 'ar',
                        ]) id="end_date" name="end_date"
                            placeholder="end date" wire:model.live="form.end_date" >
                        <label for="end_date">{{ Str::ucfirst(trans('tasks.end at')) }}</label>
                        @error('form.end_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-3">
                        <select @class([
                            'form-select',
                            'is-invalid' => $errors->has('form.is_done'),
                            'is-invalid-left' => app()->getLocale() == 'ar',
                        ]) id="is_done" name="is_done" placeholder="end date"
                            wire:model.live="form.is_done">
                            @foreach (App\Enums\TaskStatusEnum::cases() as $status)
                                <option value="{{ $status }}" @selected($status->value == $form->is_done)>
                                    {{ trans('tasks.' . $status->value) }}</option>
                            @endforeach
                        </select>
                        <label for="is_done">{{ Str::ucfirst(trans('tasks.status')) }}</label>
                        @error('form.is_done')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-3">
                        <textarea @class([
                            'form-control',
                            'is-invalid' => $errors->has('form.notes'),
                            'is-invalid-left' => app()->getLocale() == 'ar',
                        ]) id="notes" name="notes" placeholder="end date"
                            wire:model.live="form.notes" @style(['min-height: 250px'])>{{ old('notes') }}</textarea>
                        <label for="notes">{{ Str::ucfirst(trans('tasks.notes')) }}</label>
                        @error('form.notes')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">
                        <div wire:loading>
                            <div class="spinner-border" style="width: 16px; height: 16px;" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <i class="bi bi-plus"></i>
                        {{ Str::ucfirst(trans('global.save changes')) }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
