<div>
    <div class="modern-card">


        <div class="modern-card-header">
            <div class="header-content">
                <div>
                    <h1 class="modern-title">فورما رەگەز ناما</h1>
                </div>
            </div>
        </div>

        <!-- Add Nationality Button -->


        <button class="btn-primary-add mb-3" wire:click="toggleForm">

            @if ($Nationalityadd)
                گرتنا فورما رەگەز نامێ
                <i class="bi bi-x-lg"></i>
            @else
                زێدەکرنا رەگەز نامێ
                <i class="bi bi-plus-lg"></i>
            @endif
        </button>


        <!-- Add Nationality Form -->
        @if ($Nationalityadd)
            <div class="modern-card-body">
                <form wire:submit.prevent="save">
                    <div class="row g-4">
                        <!-- Name nationality -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nationality" class="form-label">
                                    <svg class="label-icon" viewBox="0 0 24 24" fill="none">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="2" />
                                        <path
                                            d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2Z"
                                            stroke="currentColor" stroke-width="2" />
                                        <path d="M2 12H22" stroke="currentColor" stroke-width="2" />
                                        <path
                                            d="M12 2C14.5013 4.73835 15.9228 8.29203 16 12C15.9228 15.708 14.5013 19.2616 12 22C9.49872 19.2616 8.07725 15.708 8 12C8.07725 8.29203 9.49872 4.73835 12 2Z"
                                            stroke="currentColor" stroke-width="2" />
                                    </svg>
                                    رەگەزنامە
                                </label>
                                <div class="input-wrapper">
                                    <input type="text"
                                        class="modern-input @error('nationality') is-invalid @enderror"
                                        wire:model="nationality" placeholder="رەگەز نامە">
                                    <div class="input-line"></div>
                                </div>
                                @error('nationality')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="text-start mt-3">

                        <button type="submit" class="btn btn-primary">
                            تۆمارکرن
                        </button>
                    </div>
                </form>
            </div>
        @endif

        <!-- Nationalities Table -->
        <div style="overflow-x: auto; border-radius: var(--radius-md); border: 1px solid var(--border);">
            <table class="table-simple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 80%">رەگەز نامە</th>
                        <th class="text-center">چالاکی</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nationalities as $nationality)
                        <tr>
                            <td style="font-weight: 600; color: var(--primary);">{{ $loop->iteration }}</td>
                            <td class="t-name">{{ $nationality->nationality }}</td>
                            <!-- Actions -->
                            <td class="align-middle">
                                <div class="d-flex justify-content-center align-items-center gap-2" > 
                                    <button class="row-btn row-btn-edit" wire:click="edit({{ $nationality->id }})" title="گوهرین">
                                        <i class="bi bi-pencil"></i>
                                    </button>


                                    <button class="row-btn row-btn-delete" title="ژێبرن"
                                        wire:click.prevent="$dispatch('confirmDelete',{id:{{ $nationality->id }} })">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($nationalities->hasPages())
            <div class="mt-3">
                {{ $nationalities->links() }}
            </div>
        @endif
    </div>

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
                        $wire.dispatch("deletenationality", {
                            id: event.id
                        });
                    }
                });
            });
        </script>
    @endscript
</div>
