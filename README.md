Nome do Projeto: Lucky Capybara

Autores: Thomas Oliveira, João Carvalho, Sandro Christe e André Oliveira

Data: <07/05/2024>

Link do Repositorio: > https://github.com/ThomasOliveiraRocha/LuckyCapybara2

Endereço publico: > http://168.75.88.169/LuckyCapybara



# Lucky Capybara

O início

Na primeira semana da disciplina de desenvolvimento web, foi apresentado o planejamento para a disciplina. Haveria um projeto de um site que seria desenvolvido a longo do semestre e, para isso, grupos foram formados. O objetivo do projeto é criar um site funcional utilizando os conhecimentos adquiridos ao longo do semestre, visando explorar tudo que foi/será aprendido.



O grupo

O grupo formado para este projeto consiste em André Luís, João Vitor Garcia, Sandro Pinheiro e Thomas Oliveira. 



A ideia

Com o grupo formado, era necessário decidir um tema para o projeto. Apareceu então, inicialmente como uma brincadeira, a ideia de fazer um site de entretenimento com simulação de apostas, algo semelhante ao muito conhecido "Jogo do Tigrinho". Inicialmente a ideia não foi levada muito a sério, todavia percebemos que ao tentar implementar isso, seria utilizado praticamente tudo que seria ensinado na disciplina e exigiria de nós um esforço considerável para fazer tudo funcionar, o que ajudaria a fixar bem o conhecimento adquirido. Dessa forma, decidimos levar essa ideia adiante, já que agregaria bastante conhecimento para todos nós, além de ser algo que seria divertido de fazer. Dessa forma surgiu o "Capivara da Sorte".



Capivara da Sorte

Como o site teve inspiração no "Jogo do Tigrinho", achamos que seria interessante utilizar outro animal como a cara da nossa ideia. O animal escolhido foi a capivara, um animal que todos gostamos bastante e achamos que encaixaria com a temática. O nome "Capivara da Sorte" logo apareceu e foi do gosto de todos. Começamos então a levantar as ideias do que haveria disponível nesse site. Para cumprir com a ideia inicial que a gente teve, teria que haver um sistema de registro e login, além de alguns jogos. Cada jogador teria uma quantidade de fichas para serem apostadas e essas fichas ficariam salvas em um banco de dados junto com as informações de cadastro do jogador. Como a motivação do site é apenas testar nossos conhecimentos e prover entretenimento, não haverá qualquer dinheiro real envolvido, sendo utilizadas apenas fichas fictícias. Da mesma forma, não incentivamos quaisquer apostas reais de quaisquer tipos. Para os jogos, foi decidido que haveriam apenas 3, sendo estes a "Roleta", o "Caça-Níqueis" e o "Blackjack", ou "21". Com essas ideias reunidas, já percebemos que no nosso site haveria uma página inicial (index), uma página de registro, uma página de login e uma página para cada um dos jogos, totalizando seis páginas.

## Link do Github:
> https://github.com/ThomasOliveiraRocha/LuckyCapybara2

## Etapas completadas do Projeto 1:

- [X] 1) MYSQL Crie uma base de dados no MySQL e exiba em uma página PHP que o seu site tem conexão com o banco de dados.

- [X] 2) MYSQL: No MySQL, crie as tabelas T_ESTADOS (id, nome, sigla) e T_CIDADES (id, nome, id_estado). O campo ‘id_estado’ em ‘T_CIDADES’ é uma chave estrangeira e referencia o campo ‘id’ da tabela T_ESTADOS.

- [X] 3) PHP: Na página PHP, faça a importação dos dados do arquivo ‘estados.txt’ para a tabela T_ESTADOS do banco de dados MySQL.

- [X] 4) PHP: Na página PHP, faça a importação do conteúdo do arquivo ‘municipios.csv’ para a tabela T_CIDADES. Observe que é necessário uma consulta SQL “SELECT” para obter o ‘id_estado’ de acordo com a ‘sigla’ em ‘municipios.csv’, antes de inserir a cidade em T_CIDADES.

- [x] 5) PHP: Na página PHP, crie um formulário que permita pesquisar municípios no banco de dados.

- [ ] 6) PHP: Na página PHP, crie um formulário que permita inserir e remover um município no banco de dados com chamada JavaScript assíncrona.

- [ ] 7) LARAVEL: Crie uma página com o framework Laravel com acesso ao banco de dados MySQL.

- [ ] 8) LARAVEL: Exiba na página criada com o framework Laravel a lista de cidades do banco de dados MySQL.

- [X] 9) README: Acrescente no arquivo README.md o endereço público do seu site.

- [X] 10) ORACLE: Hospede todo o conteúdo do site no ambiente Oracle Cloud. (Nota: o endereço público deve estar ativo e acessível na Internet.)
