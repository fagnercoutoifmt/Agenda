<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <title>Tudo sobre o google glass</title>
        <link rel="stylesheet" href="_css/estilo.css" />
    </head>
    <body>
        <?php?
         $_SESSION['url']= "http://agenda-agenda.1d35.starter-us-east-1.openshiftapps.com/";
        ?>
        <label>13</label>
        
        <div id="interface">
            <header id="cabecalho">
                <?php include('./Cabecalho.html'); ?>              
            </header>

            <section id="corpo">
                <?php include('./Corpo.html'); ?>              
            </section>
            
            <aside id="lateral">      
                <?php include('./Lateral.html'); ?>         
            </aside>
            
            <footer id="rodape">
                <?php include('./Rodape.html'); ?> 
            </footer>
        </div>
    </body>
</html>