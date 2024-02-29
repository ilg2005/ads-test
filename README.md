<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Тестовое задание на должность «Fullstack разработчик (Laravel+Vue.JS)»

Реализовать следующую систему с использованием фреймворков Laravel и Vue.js.

1. Создать      таблицу Records с помощью миграции со следующими полями:
   id – идентификатор записи
   data – json-объект формата { key1: value1, key2: value2, …. }
   access – 0/1, доступ к объекту
2. Наполнить      данную таблицу 10 записями с использованием миграции/сида, для первой      записи access – 1, для второй access – 0, для третьей – 1 итд. data      заполняется случайными данными, количество ключей до 10.
3. Реализовать      api-метод для получения записей по значениям одного или нескольких ключей      из параметра data. В метод отправляется массив пар key-value, происходит      поиск всех записей, в параметре data которых присутствуют ключи,      совпадающие с key, и значениями из value.
4. Реализовать      api-метод для получения записи по ее идентификатору. Ограничить доступ до      получения записей с полем access – 0 с помощью отдельной политики,      используя встроенные механизмы Laravel. Использование middleware и      explicit model binding будет Вашим преимуществом.
5. Реализовать      простую форму в виде SPA-приложения с использованием однофайлового      компонента Vue.js. Использование composition api будет вашим      преимуществом.
6. Форма должна      состоять из нескольких полей для ввода ключей и значений и кнопки      «Получить», в поля формы вводятся пары key-value. При вводе и нажатии      кнопки должна показываться анимация загрузки и асинхронно вызываться метод      api получения записей по значениям ключей (п.3).
7. В случае      отсутствия записей ниже формы должно появляться соответствующее сообщение.      В случае существования записи и наличии             доступа,      ниже должна отобразиться             таблица      с перечнем всех данных записей и их значений из параметра data данных      записей.

Исходный код выложить в репозиторий github/gitlab в открытом доступе для проверки.
