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
                        <img src="_imagens/glass-esquema-marcado.jpg" usemap="aImagem"/>																	 			
                        <map name="aImagem">
                            <area shape="rect" coords="179,202,270,260" href="google-glass.html#tela" target="janela" />
                            <area shape="circle" coords="158,243,12" href="google-glass.html#camera" target="janela" />
                            <area shape="circle" coords="73,52,12" href="google-glass.html#gadgets" target="janela" />
                            <area shape="poly" coords="28,143,83,216,84,249,27,169" href="google-glass.html#sensores" target="janela" />
                        </map>
                        <iframe scrolling="no" src="google-glass.html" name="janela" id="frameEspec"></iframe>
                    </section>
                </article>
            </section>
            <footer id="rodape">
                 <?php include('./Rodape.html'); ?>      
            </footer>
        </div>
    </body>
</html>