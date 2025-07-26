<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <title>Форма</title>
</head>

<body>
    <form id="sendingToAmoCRM" name ="sendingToAmoCRM" method="POST" action="{{ route('request.send_request') }}" class="main">
        @csrf
        <input name="time_spent" id="timeSpent" type="hidden">
        <div class="field">
            <label for="name">Имя:</label>
            <input name="name" id="name" type="text">
        </div>
        <div class="field">
            <label for="email">Email:</label>
            <input name="email" id="email" type="email">
        </div>
        <div class="field">
            <label for="phone">Телефон:</label>
            <input name="phone" id="phone" type="tel">
        </div>
        <div class="field">
            <label for="price">Цена:</label>
            <input name="price" id="price" type="number">
        </div>
        <button id="button" type="submit">Отправить</button>
    </form>

        @if(isset($result) && filled($result))
        <p>Сделка зарегистрирована</p>
    @endif
     @if(isset($result) && blank($result))
        <p>Сделка не зарегистрирована</p>
    @endif

    <script>
        let startTime = Date.now();

        document.getElementById("button").addEventListener('click', function () {
 const endTime = Date.now();
    const timeSpentSeconds = Math.floor((endTime - startTime) / 1000);
    document.getElementById('timeSpent').value = timeSpentSeconds;
});
    </script>
</body>

</html>
