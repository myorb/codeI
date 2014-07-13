codeI
=====

install
-------
config db connection in application/config/database.php file

SQL
-------
1
SELECT s.url, s.first_incubated_date, s.name, s.follower_count
                FROM startup AS s
                LEFT JOIN activity AS a ON s.id = a.id_startup
                WHERE a.type_author =  'Startup'
                UNION 
                SELECT s.url, s.first_incubated_date, s.name, p.follower_count
                FROM person AS p
                LEFT JOIN activity AS a ON p.id_user = a.id_author
                LEFT JOIN startup AS s ON p.id_user = s.id
                WHERE a.type_author =  'User'
                ORDER BY 4 DESC 
2
SELECT s.url,s.created_at_api, SUM(p.follower_count) as followers FROM startup as s 
                JOIN activity as a ON s.id = a.id_startup
                JOIN person as p ON p.id_user = a.id_author
                WHERE a.type_author = 'User'
                GROUP BY s.id
                ORDER BY s.created_at_api


codeigniter test task
-------------

This is first part form test task 

Схема  базы  данных  в  которой  хранится  информация  о  компаниях  и
стартапах, кто и кого инкубировал, у кого какое количество фолловеров.

1.   Выполнить   с  использованием  CodeIgniter или Yii или clear PHP.
Общение с БД через SQL запросы.
2.   Структура http://gyazo.com/b1f58e34ddb105e39e3a15399380134a
3.1  Выбрать стартапы в промежутке дат startup.first_incubated_date и вывести их в порядке спадания количества фоловеров компаний
которые "инкубировали" эти стартапы в форме (ссылка - url,дата инкубации - first_incubated_date,имя инкубатора - name, количество фоловеров инкубатора).
Данные о том кто кого инкубировал хранятся в таблице activity.
id_author - if(type_author==Startup) id компании которая инкубировала (поле id с таблицы стартап) elseif (type_author==User) id юзера с таблицы Person.id_user
id_startup - id стартапа которого инкубировали (также поле id с таблицы стартап)
follower_count - количество фоловеров
* в таблице активити хранятся все записи об активности, 1 стартап может быть инкубирован несколько раз, нужно достать информацию только о 1-м инкубировании
3.2  Выбрать стартапы в промежутке дат startup.created_at_api и вывести их в спадающем списке по сумарному количеству фоловеров
у всех пользователей которые были в активности у этого стартапа в форме (ссылка, дата создания, сумарное количество фоловеров)


