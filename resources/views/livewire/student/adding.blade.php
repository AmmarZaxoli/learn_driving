<div>

    <!-- Modern Card Design -->
    <div class="modern-card">
        <!-- Animated Header -->
        <div class="modern-card-header">
            <div class="header-content">
                <div>
                    <h1 class="modern-title">فورما قوتابی</h1>
                </div>
            </div>
        </div>
        <button class="btn-primary-add mb-3" wire:click="toggleForm">
            @if ($Studentadd)
                گرتنا فورمار فـێـرخــازی
                <i class="bi bi-x-lg"></i>
            @else
                زێدەکرنا فـێـرخــازی
                <i class="bi bi-plus-lg"></i>
            @endif
        </button>


        @if ($Studentadd)

            <!-- Form -->
            <form wire:submit.prevent="submit" class="modern-form" style="margin: 15px">
                <div class="row g-4">
                    <!-- Name -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-label">
                                <i class="bi bi-person label-icon"></i>
                                ناڤێ فـێـرخــازی
                            </label>
                            <div class="input-wrapper">
                                <input type="text" class="modern-input @error('name') is-invalid @enderror"
                                    autocomplete="off" autofocus id="name" wire:model.live="name"
                                    placeholder="ناڤێ فـێـرخــازی">
                                <div class="input-line"></div>
                            </div>
                            @error('name')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Mother Name -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mother_name" class="form-label">
                                <i class="bi bi-gender-female label-icon"></i>
                                ناڤێ دایکێ فـێـرخــازی
                            </label>
                            <div class="input-wrapper">
                                <input type="text" class="modern-input @error('mother_name') is-invalid @enderror"
                                    id="mother_name" autocomplete="off" wire:model.live="mother_name"
                                    placeholder="ناڤێ دایکێ فـێـرخــازی">
                                <div class="input-line"></div>
                            </div>
                            @error('mother_name')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Birthday -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birthday" class="form-label">
                                <i class="bi bi-calendar label-icon"></i>
                                سالا ژ دایکبونێ
                            </label>
                            <div class="input-wrapper">
                                <input type="date" class="modern-input @error('birthday') is-invalid @enderror"
                                    id="birthday" wire:model.live="birthday">
                                <div class="input-line"></div>
                            </div>
                            @error('birthday')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="location" class="form-label">
                                <i class="bi bi-geo-alt label-icon"></i>
                                ناڤو نیشان
                            </label>
                            <div class="input-wrapper">
                                <input type="text" class="modern-input @error('location') is-invalid @enderror"
                                    autocomplete="off" id="location" wire:model.live="location"
                                    placeholder="City, Country">
                                <div class="input-line"></div>
                            </div>
                            @error('location')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Mobile Number -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile_number" class="form-label">
                                <i class="bi bi-phone label-icon"></i>
                                ژمارا موبایلێ
                            </label>
                            <div class="input-wrapper">
                                <input type="tel" class="modern-input @error('mobile_number') is-invalid @enderror"
                                    autocomplete="off" id="mobile_number" wire:model.live="mobile_number"
                                    placeholder="0750 -------">
                                <div class="input-line"></div>
                            </div>
                            @error('mobile_number')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Date Join -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_join" class="form-label">
                                <i class="bi bi-calendar label-icon"></i>
                                ریێکەفتی پەیوەندیکرنێ
                            </label>
                            <div class="input-wrapper">
                                <input type="date" class="modern-input @error('date_join') is-invalid @enderror"
                                    id="date_join" wire:model.live="date_join">
                                <div class="input-line"></div>
                            </div>
                            @error('date_join')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Date DR Number -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_dr_number" class="form-label">
                                <i class="bi bi-calendar label-icon"></i>
                                ریێکەفتی لێنرینا پزیشکی
                            </label>
                            <div class="input-wrapper">
                                <input type="date" class="modern-input @error('date_dr_number') is-invalid @enderror"
                                    autocomplete="off" id="date_dr_number" wire:model.live="date_dr_number"
                                    placeholder="DR-123456">
                                <div class="input-line"></div>
                            </div>
                            @error('date_dr_number')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Invoice -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="invoice" class="form-label">
                                <i class="bi bi-file-text label-icon"></i>
                                ژمارا پسولێ
                            </label>
                            <div class="input-wrapper">
                                <input type="text" class="modern-input @error('invoice') is-invalid @enderror"
                                    autocomplete="off" id="invoice" wire:model.live="invoice"
                                    placeholder="INV-2024-001">
                                <div class="input-line"></div>
                            </div>
                            @error('invoice')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Nationality Select Box -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nationality" class="form-label">
                                <i class="bi bi-globe label-icon"></i>
                                رەگەزنامە
                            </label>
                            <div class="input-wrapper">
                                <select class="modern-input @error('nationality') is-invalid @enderror"
                                    id="nationality" wire:model.live="nationality">
                                    <option value="">— اختر الجنسية —</option>
                                    @foreach ($nationalities as $value)
                                        <option value="{{ $value->id }}">
                                            {{ $value->nationality }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="input-line"></div>
                            </div>

                            @error('nationality')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Coach name -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="coach" class="form-label">
                                <i class="bi bi-person label-icon"></i>
                                ناڤێ راهێنەری
                            </label>
                            <div class="input-wrapper">
                                <select class="modern-input @error('coach') is-invalid @enderror" id="coach"
                                    wire:model.live="coach" dir="rtl">
                                    <option value="">— هەڵبژێرە —</option>
                                    @foreach ($coachs as $coachItem)
                                        <option value="{{ $coachItem->id }}">
                                            {{ $coachItem->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <div class="input-line"></div>
                            </div>

                            @error('coach')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <!-- Number Car -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="number_car" class="form-label">
                                <i class="bi bi-car-front label-icon"></i>
                                ژمارا ئوتومبێلێ
                            </label>
                            <div class="input-wrapper">
                                <input type="text" class="modern-input @error('number_car') is-invalid @enderror"
                                    id="number_car" autocomplete="off" wire:model.live="number_car"
                                    placeholder="A-1234">
                                <div class="input-line"></div>
                            </div>
                            @error('number_car')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Car Type Select Box -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="typecar" class="form-label">
                                <i class="bi bi-car-front label-icon"></i>
                                جورێ ئوتومبێلێ
                            </label>
                            <div class="input-wrapper">
                                <select class="modern-input @error('typecar') is-invalid @enderror" id="typecar"
                                    wire:model.live="typecar">
                                    <option value="">— هەڵبژێرە —</option>
                                    <option value="0">ئوتوماتیک</option>
                                    <option value="1">عادی</option>
                                </select>
                                <div class="input-line"></div>
                            </div>
                            @error('typecar')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>

                    <!-- Data Start -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="data_start" class="form-label">
                                <i class="bi bi-calendar label-icon"></i>
                                روژا دەست پێکرنێ
                            </label>
                            <div class="input-wrapper">
                                <input type="date" class="modern-input @error('data_start') is-invalid @enderror"
                                    id="data_start" wire:model.live="data_start">
                                <div class="input-line"></div>
                            </div>
                            @error('data_start')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Learn -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="learn" class="form-label">
                                <i class="bi bi-book label-icon"></i>
                                فێرکرن
                            </label>

                            <div class="input-wrapper">
                                <select id="learn" class="modern-input @error('learn') is-invalid @enderror"
                                    wire:model.live="learn">
                                    <option value="">— هەڵبژێرە —</option>
                                    <option value="0">فێرکرن</option>
                                    <option value="1">فێرکرن و وانە</option>
                                </select>
                                <div class="input-line"></div>
                            </div>

                            @error('learn')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>

                    @if ($learn == 1)
                        <!-- Time -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="time" class="form-label">
                                    <i class="bi bi-clock label-icon"></i>
                                    کات
                                </label>

                                <div class="input-wrapper">
                                    <input type="time" id="time"
                                        class="modern-input @error('time') is-invalid @enderror"
                                        wire:model.live="time">
                                    <div class="input-line"></div>
                                </div>

                                @error('time')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="form-actions">
                    <div class="action-buttons">
                        <button type="button" class="btn btn-outline" wire:click="toggleForm">
                            <svg class="btn-icon" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M20 8C18.6739 6.02199 16.7022 4.58987 14.4442 4.03429C12.1861 3.47871 9.80221 3.83902 7.79609 5.04434C5.78997 6.24966 4.32067 8.20435 3.72244 10.4977C3.12422 12.791 3.44527 15.2421 4.61805 17.3151C5.79083 19.3881 7.72009 20.9079 9.99934 21.5599C12.2786 22.2119 14.7147 21.9412 16.8095 20.805C18.9043 19.6687 20.4797 17.763 21.1721 15.5"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                <path d="M20 4V8H16" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            پاقژکرن
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <span>تۆمارکردن</span>
                            <i class="bi bi-plus-lg"></i>
                        </button>
                    </div>
                </div>
            </form>




        @endif


        <div class="mb-3" style="margin: 10px 10px 0 10px">
            <div class="input-wrapper">
                <input type="text" class="modern-input" wire:model.live="search"
                    placeholder="گەریان ل ناڤ، موبایل، ناونیشان ،راهێنەری...">
                <div class="input-line"></div>
            </div>
        </div>
        <div style="overflow-x: auto; border-radius: var(--radius-md); border: 1px solid var(--border);">

            <table class="table-simple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-center">ناڤ</th>
                        <th class="text-center">ناونیشان</th>
                        <th class="text-center">موبایل</th>
                        <th class="text-center">ڕاهێنەر</th>
                        <th class="text-center"> جورێ ئوتومبێلێ</th>
                        <th class="text-center">فێرکرن</th>
                        <th class="text-center">روژا دەستپێکرنێ</th>
                        <th class="text-center">چالاکی</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($Students as $index => $Student)
                        <tr>
                            <td style="font-weight:600; color:var(--primary);">
                                {{ $index + 1 }}
                            </td>

                            <td class="text-center">{{ $Student->name ?? '-' }}</td>
                            <td class="text-center">{{ $Student->location ?? '-' }}</td>
                            <td class="text-center">{{ $Student->mobile_number ?? '-' }}</td>
                            <td class="text-center">{{ $Student->coach->name ?? '-' }}</td>
                            <td class="text-center fw-bold">
                                {{ $Student->typecar == 0 ? 'ئوتوماتیک' : ($Student->typecar == 1 ? 'عادی' : '-') }}
                            </td>
                            <td class="text-center fw-bold">
                                {{ $Student->learn == 0 ? 'فێرکرن' : ($Student->learn == 1 ? 'فێرکرن و وانە' : '-') }}
                            </td>
                            <td class="text-center">{{ $Student->data_start ?? '-' }}</td>

                            <!-- Actions -->
                            <td class="align-middle">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <button class="row-btn row-btn-edit" title="گوهرین"
                                        wire:click="edit({{ $Student->id }})">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button class="row-btn row-btn-delete" title="ژێبرن"
                                        wire:click.prevent="$dispatch('confirmDelete', {id: {{ $Student->id }}})">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <!-- Print -->
                                    <button class="row-btn row-btn-outline-print" title="پرێنت"
                                        onclick="printStudent({{ $Student->id }})">

                                        <i class="bi bi-printer"></i>
                                    </button>



                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            <iframe id="printFrame" style="display:none;"></iframe>
        </div>

        <!-- Pagination -->
        @if ($Students->hasPages())
            <div class="mt-3">
                {{ $Students->links() }}
            </div>
        @endif


        <div class="print-options">
            <label class="custom-checkbox">
                <input type="checkbox" id="printTemplate1">
                <span class="checkmark"></span>
                <span class="label-text">فورما قوتابی</span>
            </label>

            <label class="custom-checkbox">
                <input type="checkbox" id="printTemplate2">
                <span class="checkmark"></span>
                <span class="label-text">فورما قوتابی بو ریڤەبەریێ</span>
            </label>

            <label class="custom-checkbox">
                <input type="checkbox" id="printTemplate3">
                <span class="checkmark"></span>
                <span class="label-text">فورما وانان و فێرکرنێ</span>
            </label>
            <label class="custom-checkbox">
                <input type="checkbox" id="printTemplate4">
                <span class="checkmark"></span>
                <span class="label-text">payment</span>
            </label>
        </div>
        <style>
            .print-options {
                display: flex;
                gap: 20px;
                align-items: center;
                direction: rtl;
                margin: 15px 0;
            }

            .custom-checkbox {
                display: flex;
                align-items: center;
                cursor: pointer;
                font-size: 20px;
                color: #333;
                user-select: none;
            }

            .custom-checkbox input {
                display: none;
            }

            .checkmark {
                width: 18px;
                height: 18px;
                border: 2px solid #0d6efd;
                border-radius: 4px;
                margin-left: 8px;
                position: relative;
                transition: 0.3s;
            }

            .custom-checkbox input:checked+.checkmark {
                background-color: #0d6efd;
            }

            .custom-checkbox input:checked+.checkmark::after {
                content: "✔";
                position: absolute;
                color: #fff;
                font-size: 12px;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -55%);
            }

            .label-text {
                font-weight: 500;
            }
        </style>



    </div>
    {{-- <script>
        function printStudent(id) {
            const iframe = document.getElementById('printFrame');
            iframe.src = '/students/print/' + id;
        }
    </script> --}}



    <script>
        function printStudent(studentId) {
            const print1 = document.getElementById('printTemplate1').checked;
            const print2 = document.getElementById('printTemplate2').checked;
            const print3 = document.getElementById('printTemplate3').checked;
            const print4 = document.getElementById('printTemplate4').checked;

            if (!print1 && !print2 && !print3 && !print4) {
                alert('Select at least one template to print.');
                return;
            }

            let url = '';

            if (print1 && print2 && print3 && print4) {
                url = '/students/print-combined/' + studentId;
            } else if (print1) {
                url = '/students/print/' + studentId;
            } else if (print2) {
                url = '/students/print_mror/' + studentId;
            } else if (print3) {
                url = '/students/print_time/' + studentId;
            } else if (print4) {
                url = '/students/print_payment/' + studentId;
            }

            const iframe = document.createElement('iframe');
            iframe.style.display = 'none';
            iframe.src = url;
            document.body.appendChild(iframe);

            iframe.onload = () => {
                iframe.contentWindow.print();
                setTimeout(() => iframe.remove(), 500);
            };
        }
    </script>






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
                        $wire.dispatch("deleteStudent", {
                            id: event.id
                        });
                    }
                });
            });
        </script>
    @endscript

</div>
