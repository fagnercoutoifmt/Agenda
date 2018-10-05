<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <title>Tudo sobre o google glass</title>
        <link rel="stylesheet" type="text/css" href="_css/estilo.css" />
        <link rel="stylesheet" type="text/css" href="_css/form.css" />
        <script>
            function calcularTotal() {
                var qtd = parseInt(document.getElementById('cQtd').value);
                document.getElementById('cTot').value = qtd * 1800;
            }
        </script>
    </head>
    <body>
        <div id="interface">
            <header id="cabecalho">
                <?php include('./Cabecalho.html'); ?>      
            </header>
            <article id="artigoPrincipal">
                <header id="cabecalhoArtigo">
                    <hgroup>
                        <h1>Fale Conosco > Contato</h1>
                        <h2>Formulário de Contato</h2>
                    </hgroup>
                </header>
                <form method="post" id="fContato" action="mailto:usuario@servidor.com.br" oninput="calcularTotal();" >
                    <fieldset id="usuario"><legend>Identificação do Usuário</legend>
                        <p><label for="cNome">Nome:</label><input type="text" 
                                                                  name="tNome" id="cNome" size="30" 
                                                                  maxlength="30" placeholder="Nome Completo" /></p>
                        <p><label for="cSenha">Senha:</label><input type="password" 
                                                                    name="tSenha" id="cSenha" size="8"
                                                                    maxlength="8" placeholder="Senha" /></p>
                        <p><label for="cEmail">E-mail:</label><input type="email" 
                                                                     name="tEmail" id="cEmail" size="40" 
                                                                     maxlength="40" placeholder="usuario@servidor..."></p>
                        <fieldset id="sexo"><legend>Sexo:</legend>
                            <input type="radio" name="tSexo" id="cMasc" />
                            <label for="cMasc">Masculino</label><br />
                            <input type="radio" name="tSexo" id="cFem" />
                            <label for="cFem">Feminino</label>
                        </fieldset>
                        <p><label for="cData">Data de Nascimento:</label>
                            <input type="date" name="tData" id="cData" /></p>
                    </fieldset>

                    <fieldset id="endereco"><legend>Endereço do Usuário</legend>
                        <p><label for="cLog">Logradouro:</label>
                            <input type="text" name="tLog" id="cLog"
                                   size="30" maxlength="100" 
                                   placeholder="Avenida, Rua, Travessa..." /></p>
                        <p><label for="cNum">Número:</label>
                            <input type="number" name="tNum" id="cNum"
                                   min="0" max="99999" 
                                   placeholder="Número do logradouro..." />
                            <label for="cComp">Complemento:</label>
                            <input type="text" name="tComp" id="cComp"
                                   size="5" maxlength="1" /></p>

                        <p>Estado:
                            <select name="tEst" id="cEst">
                                <option value="">------------------------</option>
                                <optgroup label="Região SUL">
                                    <option value="PR">Paraná</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="SC">Santa Catarina</option>
                                </optgroup>
                                <optgroup label="Região SUDESTE">
                                    <option value="ES">Espírito Santo</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="SP">São Paulo</option>
                                </optgroup>
                                <optgroup label="Região CENTRO-OESTE">
                                    <option value="DF">Distrito Federal</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                </optgroup>
                                <optgroup label="Região NORDESTE">
                                    <option value="AL">Alagoas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="SE">Sergipe</option>
                                </optgroup>
                                <optgroup label="Região NORTE">
                                    <option value="AC">Acre</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="PA">Pará</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="TO">Tocantins</option>
                                </optgroup>
                            </select>
                        </p>
                        <p><label for="cCid">Cidade:</label>
                            <input type="text" name="tCid" id="cCid" 
                                   placeholder="Sua cidade" size="20" 
                                   maxlength="40" list="cidades"/>
                            <datalist id="cidades">
                                <option value="Tangará da Serra"></option>
                                <option value="Sapezal"></option>
                                <option value="Campo Novo do Parecis"></option>
                                <option value="Nova Olímpia"></option>
                            </datalist>
                        </p>
                    </fieldset>

                    <fieldset id="mensagem"><legend>Mensagem do Usuário</legend>
                        <p><label for="cUrg">Grau de Urgência:</label>
                            <sup>MIN</sup><input type="range" name="tUrg" id="cUrg"
                                                 min="0" max="10" step="1" />
                            <sup>MAX</sup></p>
                        <p><label for="cMsg">Mensagem:</label>
                            <textarea name="tMsg" id="cMsg" 
                                      cols="30" rows="5" 
                                      placeholder="Deixe aqui sua mensagem!"></textarea></p>
                    </fieldset>
 
                    <fieldset id="pedido"><legend>Quero um Google Glass</legend>
                        <p><input type="checkbox" name="tPed" id="cPed" checked />
                            <label for="cPed">Gostaria de adquirir um Google 
                                Glass quando disponível</label></p>
                        <p><label for="cCor">Cor:</label>
                            <input type="color" name="tCor" id="cCor" value="#ffffff" />
                        </p>
                        <p><label for="cQtd">Quantidade:</label>
                            <input type="number" name="tQtd" id="cQtd" min="0" max="5" value="0" />
                        </p>
                        <p><label for="cTot">Preço Total: R$</label>
                            <input type="text" name="tTot" id="cTot" 
                                   placeholder="Total a pagar" readonly />
                        </p>
                    </fieldset>
                    <input type="image" src="_imagens/botao-enviar.png" />
                </form>
            </article>
            <footer id="rodape">
                <?php include('./Rodape.html'); ?>      
            </footer>
        </div>
    </body>
</html>