# Onde está Sofia?

Sofia é o nome da sua gata, e você precisa encontrá-la o mais rápido possível em sua casa.
Você receberá um arquivo onde cada linha representa a sua "residência" e seus aposentos. Os dados estarão estruturados no seguinte formato:

{NOME1},{CHANCE1},{TEMPO1};{NOME2},{CHANCE2},{TEMPO2};{NOMEn},{CHANCEn},{TEMPOn};{NOME99},{CHANCE99},{TEMPO99}

# File: Input.txt
	- Quarto,15,5;Cozinha,20,8;Sala,30,10;Banheiro,6,2;Sótão,12,20;Jardim,17,18
	- Suíte,20,12;Banheiro,8,8;Jardim,8,20;Porão,15,18;Quarto,15,8;Sala,34,23
	- Quarto,51,15;Cozinha,49,12
	- Sala,34,10;Quarto,32,12;Cozinha,33,8

# Onde:
	- {NOMEn}   = Nome do aposento ou parte da casa
	- {CHANCEn} = Chances de encontrar o gato no aposento, em %
	- {TEMPOn}  = Tempo gasto para procurar a gata, em segundos

# Exercicio:
Para cada linha (situação), você deverá informar a sequência mais eficiente para encontrar Sofia em um arquivo "retorno.txt", que 
deverá estar formatado conforme o exemplo:

# File: return.txt
	- Quarto,Cozinha,Sala,Banheiro,Sótão,Jardim
	- Cozinha,Sala,Quarto
	- Banheiro,Quarto,Sala,Jardim,Suíte
	- Cozinha,Quarto


# Informações sobre o desenvolvedor
 - Nome: Vinícius Schlee Tessmann
 - Email: viniciusschleetessmann@gmail.com

 