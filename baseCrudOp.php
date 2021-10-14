$crud=new ClassCrud();


#Inserindo dados
$date=date("Y-m-d H:i:s");
$crud->insertDB(
            "users",
            "?,?,?,?,?,?,?,?",
            array(
                0,
                'Ivan',
                'izichtl@12gmail.com',
                '1234',
                '10/10/2000',
                $date,
                'user',
                'ativo',
            )
        );

#carregando dados
$select=$crud->selectDB(
    "*",
    "users",
    "",
    array(
        
    )

);
$f=$select->fetch(PDO::FETCH_ASSOC);
var_dump($f);

#atualizando dados
$select=$crud->updateDB(
    "users",
    "email=?",
    "id=?",
    array(
        'izichtl@hotmail.com',
        13
    )

);
#deletando dados
$select=$crud->deleteDB(
    "users",
    "id=?",
    array(
        13
    )

);