<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <title>Tudo sobre o google glass</title>
        <link rel="stylesheet" type="text/css" href="_css/estilo.css" />
        <link rel="stylesheet" type="text/css" href="_css/specs.css" />
    </head>
    <body>
        <div id="interface">
            <header id="cabecalho">
                <?php include('./Cabecalho.html'); ?>      
            </header>
            <section id="corpoInteiro">
                <article id="artigoPrincipal">
                    <header id="cabecalhoArtigo">
                        <hgroup>
                            <h1>Glass > Especificações</h1>
                            <h2>Raio-X no Google Glass</h2>
                        </hgroup>
                    </header>
                    <p>Clique em qualquer área destacada da imagem para ter mais 
                        informações sobre os recursos do Google Glass. Qualquer 
                        ponto vermelho vai te levar a um lugar cheio de novas informações.</p>
                    <section id="conteudo">
                        <img src="http://www.ficifmt.online/_imagens/glass-esquema-marcado.jpg" usemap="aImagem"/>																	 			
                        <map name="aImagem">
                            <area shape="rect" coords="179,202,270,260" href="http://www.ficifmt.online/google-glass.php#tela" target="janela" />
                            <area shape="circle" coords="158,243,12" href="http://www.ficifmt.online/google-glass.php#camera" target="janela" />
                            <area shape="circle" coords="73,52,12" href="http://www.ficifmt.online/google-glass.php#gadgets" target="janela" />
                            <area shape="poly" coords="28,143,83,216,84,249,27,169" href="http://www.ficifmt.online/google-glass.php#sensores" target="janela" />
                        </map>
                        <iframe scrolling="no" src="http://www.ficifmt.online/google-glass.php" name="janela" id="frameEspec"></iframe>
                    </section>
                </article>
            </section>
            <footer id="rodape">
                <?php include('./Rodape.html'); ?>      
            </footer>
        </div>
    </body>
</html>