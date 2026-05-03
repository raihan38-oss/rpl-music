



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Document</title>
    
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <div class="logo-icon"></div>
            <span class="logo-text">RPL MUSIC</span>
        </div>
        <div class="login-header">
            <h1>Selamat Datang</h1>
            <p>Mari Temukan Musik Kesukaanmu</p>
        </div>
        <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" class="form-input">
        @error('email')
        <p style="color: red">{{ $message }}</p>
        @enderror
        </div>

        <div class="form-group">
        <label for="password">password :</label>
        <div class="password-wrapper">
        <input type="password" name="password" id="password" class="form-input">
        <button type="button" class="toggle-password" onclick="togglePassword(event)">👻 Lihat</button>
        </div>
        @error('password')
        <p style="color: red">{{ $message }}</p>
        
        @enderror
        </div>
        <button type="submit" class='btn-login'>Simpan</button>
    </div>
    <script>
function togglePassword(event) {

    event.preventDefault();
    
    const passwordInput = document.getElementById('password');
    const toggleBtn = event.target;

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleBtn.textContent = '👻 Sembunyikan';
    } else {
        passwordInput.type = 'password';
        toggleBtn.textContent = '👻 Lihat';
    }
}
</script>
</form>
</body>
</html>
