<div>
    <div class="modern-card">

        <div class="modern-card-header">
            <div class="header-content">
                <div>
                    <h1 class="modern-title">فورما قوتابی</h1>
                </div>
            </div>

        </div>
        <button class="btn-primary-add mb-3" wire:click="toggleForm">
            @if ($coachAdd)
                گرتنا فورمار اهێنەری
                <i class="bi bi-x-lg"></i>
            @else
                زێدەکرنا راهێنەری
                <i class="bi bi-plus-lg"></i>
            @endif
        </button>



        @if ($coachAdd)
            <div class="modern-card-body mt-3">
                <form wire:submit.prevent="save">
                    <div class="row g-4">

                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">ناڤێ راهێنەری</label>
                                <div class="input-wrapper">
                                    <input type="text" class="modern-input @error('name') is-invalid @enderror"
                                        wire:model.defer="name">
                                    <div class="input-line"></div>
                                </div>
                                @error('name')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Mobile -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">ژمارا موبایلێ</label>
                                <input type="text" class="modern-input" wire:model.defer="mobile">
                            </div>
                        </div>

                        <!-- Number ID -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">ژمارەی ناسنامێ</label>
                                <input type="text" class="modern-input" wire:model.defer="numberid">
                            </div>
                        </div>

                        <!-- Expiry -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">مێژویا بسەرڤە چوون</label>
                                <input type="date" class="modern-input" wire:model.defer="datenumberidexpiry">
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">ناڤ و نیشان</label>
                                <textarea class="modern-input" rows="3" wire:model.defer="address"></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="text-start mt-3">

                        <button type="submit" class="btn btn-primary">
                            {{ $isEdit ? 'گوهرینا راهێنەری' : 'زێدەکرنا راهێنەری' }}
                        </button>


                    </div>
                </form>
            </div>
        @endif




        <!-- Simple Table -->
        <div style="overflow-x: auto; border-radius: var(--radius-md); border: 1px solid var(--border);">
            <table class="table-simple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-center">ناڤ</th>
                        <th class="text-center">ژمارا موبایلێ</th>
                        <th class="text-center">ژمارا ناسنامێ</th>
                        <th class="text-center">سەرڤە چوون</th>
                        <th class="text-center">ناڤ و نیشان</th>
                        <th class="text-center">چالاکی</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($coaches as $index => $coach)
                        <tr>
                            <td style="font-weight:600; color:var(--primary);">
                                {{ $index + 1 }}
                            </td>

                            <td class="text-center t-name">
                                {{ $coach->name }}
                            </td>

                            <td class="text-center">
                                {{ $coach->mobile ?? '-' }}
                            </td>

                            <td class="text-center">
                                {{ $coach->numberid ?? '-' }}
                            </td>

                            <td class="text-center">
                                <span class="status status-active">
                                    {{ $coach->datenumberidexpiry ?? '-' }}
                                </span>
                            </td>

                            <td class="text-center">
                                {{ $coach->address ?? '-' }}
                            </td>

                            <!-- Actions -->
                            <td class="align-middle">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <button class="row-btn row-btn-edit" title="گوهرین"
                                        wire:click="edit({{ $coach->id }})">
                                        <i class="bi bi-pencil"></i>
                                    </button>




                                    <button class="row-btn row-btn-delete" title="ژێبرن"
                                        wire:click.prevent="$dispatch('confirmDelete',{id:{{ $coach->id }} })">
                                        <i class="bi bi-trash"></i>
                                    </button>



                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>

            </table>
        </div>

        <!-- Pagination -->
        @if ($coaches->hasPages())
            <div class="mt-3">
                {{ $coaches->links() }}
            </div>
        @endif

    </div>


    {{-- <!-- Add Coach Modal -->
    <div class="modal fade" id="addCoachModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
        wire:ignore.self>
        <div class="modal-dialog modal-lg    modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-header modern-card-header">
                    <h4 class="modal-title">زێدەکرنا راهێنەری</h4>

                </div>

                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="row g-4">

                            <!-- Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">ناڤێ راهێنەری</label>
                                    <div class="input-wrapper">
                                        <input type="text" class="modern-input @error('name') is-invalid @enderror"
                                            wire:model.defer="name" placeholder="ناڤێ راهێنەری">
                                        <div class="input-line"></div>
                                    </div>
                                    @error('name')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Mobile -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">ژمارا موبایلێ</label>
                                    <div class="input-wrapper">
                                        <input type="text" class="modern-input" wire:model.defer="mobile"
                                            placeholder="07xxxxxxxx">
                                        <div class="input-line"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Number ID -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">ژمارەی ناسنامێ</label>
                                    <div class="input-wrapper">
                                        <input type="text" class="modern-input" wire:model.defer="numberid"
                                            placeholder="ناسنامە">
                                        <div class="input-line"></div>
                                    </div>

                                </div>
                            </div>

                            <!-- ID Expiry Date -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">مێژویا بسەرڤە چونا ناسنامێ</label>
                                    <div class="input-wrapper">
                                        <input type="date" class="modern-input"
                                            wire:model.defer="datenumberidexpiry">
                                        <div class="input-line"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Address (full width) -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">ناڤ و نیشان</label>
                                    <div class="input-wrapper">
                                        <textarea class="modern-input" wire:model.defer="address" rows="3" placeholder="ناونیشان"></textarea>
                                        <div class="input-line"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Actions -->
                        <div class="text-start mt-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                دەرکەتن
                            </button>
                            <button type="submit" class="btn btn-primary">
                                تۆمارکرن
                            </button>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('close-add-coach-modal', () => {
                const modalEl = document.getElementById('addCoachModal');
                const modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
            });
        });
    </script> --}}

    @script
        <script>
            $wire.on("confirmDelete", (event) => {
                Swal.fire({
                    title: "یــێ پشــت راستی؟",
                    text: "دووبـارە نـەشـێ بــزڤـریــنی!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "بـەلـێ!",
                    cancelButtonText: "نەخێر",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $wire.dispatch("deleteCoach", {
                            id: event.id
                        });
                    }
                });
            });
        </script>
    @endscript

</div>
