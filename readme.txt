﻿Плагин позволяет предоставлять пользователям скидки в зависимости от их поведения на сайте.
Скидки реализованы через генерацию скидочных купонов с заданными в админке процентными значениями.

Фронт:

1. Если пользователь авторизован на сайте, то в корзину для него автоматически добавляется скидочный купон
с заданным в админке процентным значением скидки. В этом случае сообщение о доступной скидке не выводится.

2. Если пользователь не авторизован на сайте, то при повторном за текущие сутки заходе на сайт ему 
отображается сообщение с указанием размера скидки и кода купона. Купон автоматически применяется в корзине.

3. Если пользователь не авторизован и в течение данных суток еще не заходил на сайт, то при подведении курсора к кнопке закрытия окна,
пользователю отображается сообщение с указанием размера скидки и кода скидочного купона.

Админка:

1. При активации плагина используются размеры скидок по умолчанию (из задания).

2. Значение скидки для каждого типа пользователя можно менять на странице настроек плагина.

3. Для каждой скидки генерируется соответствующий процентный купон (купоны не дублируются).

4. На странице статистики можно посмотреть, сколько раз был применен каждый из созданных плагином купонов.


В репозитории размещен код плагина, а также архив для его установки.