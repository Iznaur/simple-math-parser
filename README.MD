1. для решения задачи использовался Shunting Yard alghoritm: https://en.wikipedia.org/wiki/Shunting-yard_algorithm
2. возможность расширения сделана через интерфейс CalculatorStraegyInterface и dependency container symfony
3. в реальном приложении я бы наверное не стал делать почти все exceptions invalidArgumentException а наследовался бы от него и уточнил бы в в чем именно проблема:)
4. можно было еще написать функциональный тест,  для проверки сервиса, и инжектинга, так же опустил совсем простые тесты
5. vendor/bin/simple-phpunit для запуска тестов