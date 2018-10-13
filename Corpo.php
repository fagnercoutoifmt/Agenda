<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <article id="artigoPrincipal">
            <header id="cabecalhoArtigo">
                <hgroup>
                    <h1>Tecnologia > Inovações</h1>
                    <h2>Saiba tudo sobre o Google Glass</h2>
                </hgroup>
            </header>
            <div style="width:520px;
                 height:1600px;
                 overflow:auto;"> 
                <?php
                include("./DataBase/config.php");
 

                $sql = "SELECT * FROM `Noticias` ORDER BY `Noticias`.`data` DESC LIMIT 0,10";
                $result = mysqli_query($mysqli, $sql);

                while ($aux_query = mysqli_fetch_array($result)) {
                    echo "<h2>".$aux_query['agTitulo']."</h2>";
                    
                    if (!empty($aux_query['agTexto'])) {
                        echo "<p>".$aux_query['agTexto']."</p>";
                    }
                    if (!empty($aux_query['agImagem'])) {
                        echo "  <figure class=\"foto-legenda\">
                                       <img src=\"".$aux_query['agImagem']."\" />
                                       <figcaption>".$aux_query['agImagemCaption']."</figcaption>
                                   </figure>";
                    }
                    if (!empty($aux_query['agVideo'])) {
                        echo "<iframe width=\"500\" height=\"283\" "
                        . "src=\"".$aux_query['agVideo']."\" 
                                 \"frameborder=\"0\" allow=\"autoplay; encrypted-media\"
                                    allowfullscreen>
                                    </iframe>";
                    }
                }
                ?>

                <!--
                               <div>
                                   <h2>O que é</h2>
                                   <p>O Google Glass é um acessório em forma de óculos que 
                                       possibilita a interação dos usuários com diversos conteúdos 
                                       em realidade aumentada. Também chamado de Project Glass, 
                                       o eletrônico é capaz de tirar fotos a partir de comandos 
                                       de voz, enviar mensagens instantâneas e realizar 
                                       vídeoconferências. Seu lançamento está previsto para 2014, 
                                       e seu preço deve ser de US$ 1,5 mil. Atualmente o 
                                       <em>Google Glass</em> encontra-se em fase de testes e já possui 
                                       um vídeo totalmente gravado com o dispositivo. Além disso, 
                                       a companhia de buscas registrou novas patentes anti-furto 
                                       e de desbloqueio de tela para o acessório.</p>
               
                                   <figure class="foto-legenda">
                                       <img src="_imagens/glass-quadro-homem-mulher.jpg" />
                                       <figcaption>Google Glass</figcaption>
                                   </figure>
                               </div>
               
                              <div>
                                   <h2>Data de lançamento</h2>
                                   <p>Não há uma data específica e oficial para o dispositivo 
                                       ser lançado, ainda. Pode ser que ele esteja disponível 
                                       em demonstrações a partir de 2013, mas seu lançamento 
                                       para as lojas fica para, pelo menos, 2014.</p>
                               </div>
                               <div>
                                   <h2>Especificações Técnicas</h2>
                                   <table id="tabelaEspec">
                                       <caption>Tabela Técnica do Google Glass <span>Set/2018</span></caption>
                                       <tr><td class="colEsq">Tela</td><td class="colDir">Resolução equivalente a tela de 25"</td></tr>
                                       <tr><td rowspan="2" class="colEsq">Camera</td><td class="colDir">5MP para fotos</td></tr>
                                       <tr><td class="colDir">720p para vídeos</td></tr>
                                       <tr><td rowspan="2" class="colEsq">Conectividade</td><td class="colDir">Wi-Fi</td></tr>
                                       <tr><td class="colDir">Bluetooth</td></tr>
                                       <tr><td class="colEsq">Memória Interna</td><td class="colDir">12GB</td></tr>
                                   </table>
                               </div>
                               <div>
                                   <h2>Como funciona</h2>
                                   <p>De acordo com fontes próximas do Google, os óculos 
                                       vão contar com uma pequena tela de LCD ou AMOLED 
                                       na parte superior e em frente aos olhos do usuário. 
                                       Com o uso de uma câmera e GPS, você pode se situar, 
                                       assim como selecionar opções com o movimento da cabeça</p>
               
                                   <h2>O que você pode fazer com o Google Glasses</h2>
                                   <p>O vídeo de divulgação do Google mostra que você pode 
                                       se transformar em uma espécie de “super-humano”, 
                                       já que o aparelho pode indicar a quantos metros 
                                       você está de seu destino, se o metrô está aberto 
                                       ou fechado, mostrar o clima, agenda e até mesmo permitir 
                                       que você marque encontros apenas com comandos de voz.</p>
               
                                   <video id="filmeIndex" controls="controls" poster="_imagens/video-mini01.jpg">
                                       <source src="_media/one-day.mp6" type="video/mp4" />
                                       Desculpe, mas não foi possível carregar o vídeo!
                                   </video>
                               </div>-->
            </div> 
        </article>
    </body>
</html>
