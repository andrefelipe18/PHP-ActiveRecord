# ActiveRecord

Esse repositório faz parte de uma série de estudos que venho fazendo para aprimorar meus conhecimentos em PHP com o intuito de construir um framework próprio. O objetivo é entender como funcionam os principais componentes de um framework, como o Laravel, por exemplo.

## O que é ActiveRecord?

ActiveRecord é um padrão de projeto cujo objetivo é mapear as tabelas de um banco de dados relacional para objetos. 
Ou seja, cada registro de uma tabela é representado por um objeto. Dessa forma, é possível manipular os registros do banco de dados como se fossem objetos.

## Como funciona?

Inicialmente é criado uma Model, essa model é responsável por representar uma tabela do banco de dados.
Ela pode ou não ter uma propriedade chamada $table, responsável por informar o nome da tabela que a model representa.
Isso por que caso não exista a propriedade $table, o ActiveRecord irá assumir que o nome da tabela é o nome da classe em minúsculo.

```php
class User extends ActiveRecord
{
    protected ?string $table = 'users';
}
```

Agora podemos manipular os registros da tabela users como se fossem objetos.

```php

$user = new User();

$user->name = 'John Doe';

$user->execute(new Insert());

```

A propriedade $name não existe na classe User, mas como o ActiveRecord é dinâmico, ele irá criar a propriedade $name e atribuir o valor 'John Doe' a ela, com os métodos mágicos __set e __get.

## Como executar uma query?

Para executar uma query, é necessário criar uma instância de uma classe que implemente a interface ActiveRecordExecuteContract.
Isso por que o ActiveRecord não execute a query de fato, quem faz isso é a classe passada como parâmetro para o método execute.
Essa estratégia foi adotada para que o ActiveRecord siga o princípio de Open/Closed, ou seja, aberto para extensão e fechado para modificação.
Assim fazendo com que toda vez que uma nova funcionalidade seja necessária, seja possível criar uma nova classe que implemente a interface ActiveRecordExecuteContract, sem a necessidade de modificar o ActiveRecord.

## Alguns exemplos

Alguns exemplos de classes que implementam a interface ActiveRecordExecuteContract são:

- [Insert](./App/Database/ActiveRecord/Insert.php)
- [FindBy](./App/Database/ActiveRecord/FindBy.php)
- [FindAll](./App/Database/ActiveRecord/FindAll.php)
- [Update](./App/Database/ActiveRecord/Update.php)
- [Delete](./App/Database/ActiveRecord/Delete.php)

Tanto na pasta de tests quanto no arquivo index.php, existem exemplos de como utilizar essas classes.