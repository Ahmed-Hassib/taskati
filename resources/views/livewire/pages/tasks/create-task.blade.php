<div>
    <form wire:submit="store" id="addTaskForm">
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
                        placeholder="end date" wire:model.live="form.end_date">
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
                    {{ Str::ucfirst(trans('tasks.add new')) }}
                </button>
            </div>
        </div>
    </form>
</div>
