<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Print Student</title>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body onload="window.print()">

    {{-- Template 1 --}}
    @include('student.print')

    <div class="page-break"></div>

    {{-- Template 2 --}}
    @include('student.print_mror')
    {{-- Template 3 --}}
    @include('student.time')

</body>
</html>
