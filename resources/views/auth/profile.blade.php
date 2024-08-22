<x-layout>
    <h1>Личный кабинет пользователя</h1>
    <ul>
        <li>Имя: {{ $user->name  }}</li>
        <li>Email: {{ $user->email  }}</li>
    </ul>
</x-layout>
