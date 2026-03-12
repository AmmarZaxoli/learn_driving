<div>
<!DOCTYPE html>
<html lang="ckb" dir="rtl">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>چوونەژوور</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-blue-900 min-h-screen flex items-center justify-center">

<div class="bg-white rounded-2xl shadow-xl p-8 w-[420px]">

<h2 class="text-2xl font-bold text-center mb-6">چوونەژوور</h2>

<form wire:submit.prevent="login" class="space-y-5">

<div>
<label class="block mb-1 font-semibold">ناڤ</label>

<input
type="text"
wire:model="name"
class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300"
placeholder="username">

@error('name')
<span class="text-red-500 text-sm">{{ $message }}</span>
@enderror

</div>

<div>

<label class="block mb-1 font-semibold">پاسۆرد</label>

<input
type="password"
wire:model="password"
class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300"
placeholder="******">

@error('password')
<span class="text-red-500 text-sm">{{ $message }}</span>
@enderror

</div>

<div class="flex items-center gap-2">

<input type="checkbox" wire:model="remember">
<label>من لەبیر مەکە</label>

</div>

<button
type="submit"
class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700">

چوونەژوور

</button>

</form>

</div>

<script>

document.addEventListener('livewire:load', function () {

const input = document.querySelector('[wire\\:model="name"]');

if(input){
input.focus();
}

});

</script>

</body>
</html>
</div>