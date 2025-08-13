<?php
echo "<h2>Arrays</h2>";
echo "um array é na verdade, um mapa ordenado. Ou seja, é um tipo que relaciona valores a chave. Portanto, é uma lista de valores que serão armazenados na memória.";
echo "<hr>";
echo "<h2>Criando o array</h2>";
$arr = ["primeiro","segundo","terceiro"];
print_r($arr);
echo "<hr>";
echo "<h2>Outra forma de criar o array</h2>";
$arr = ["primeiro","segundo","terceiro"];
print_r($arr);
echo "<hr>";
echo "<h2>Utilizando o índice do array</h2>";
$arr = ["primeiro","segundo","terceiro"];
echo $arr[2];
echo "<hr>";
echo "<h2>Array Associativo</h2>";
$arr = array("nome"=>"Alberto","sobrenome"=>"Roberto","idade"=>"105");
echo "Nome:".$arr["nome"]."<br>";
echo "Sobrenome:".$arr["sobrenome"]. "<br>";
echo "Idade:".$arr["idade"];
echo "<hr>";
echo "<h2>Array Multidimencional</h2>";
$arr = array(
    array("primeiro","segundo"),
    array("terceiro","quarto")
);
print_r($arr);
print_r($arr);
echo "<br>";
print_r($arr[0]);
echo "<br>";
echo $arr[1][1];
echo "<hr>";
echo "<h2>Contando os elementos de um array</h2>";
$numeros = [1, 2, 300, 7000, 23, 56, 89, 21, 54, 34, 345];
echo count($numeros);
echo "<hr>";
echo "<h2>Adicionando dinamicamente elementos em um array</h2>";
$arr = array();
$arr[] = "azul";
$arr[] = "vermelho";
$arr[] = "amarelo";
print_r($arr);
echo "<hr>";
echo "<h2>Adicionando no inicio do array</h2>";
$frutas = array("Maçã","Melão","Melancia");
array_shift($frutas);
print_r($frutas);
echo "<hr>";
echo "<h2>Procurando um elemento no array</h2>";
$frutas= array("maçã", "melão", "melancia", "uva", "goiaba", "amora")
$proc = "melancia";
$index = array_search($proc, $frutas);
if ($index !== false) {
    echo "O elemento $proc esta na posição $index";
} else {
    echo "Elemeto não encontrado!";
}
?>