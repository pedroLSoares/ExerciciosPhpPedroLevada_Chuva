<?php

namespace Galoa\ExerciciosPhp\TextWrap;

/**
 * Implemente sua resolução nessa classe.
 *
 * Depois disso:
 * - Crie um PR no github com seu código
 * - Veja o resultado da correção automática do seu código
 * - Commit até os testes passarem
 * - Passou tudo, melhore a cobertura dos testes
 * - Ficou satisfeito, envie seu exercício para a gente! <3
 *
 * Boa sorte :D
 */
class Resolucao implements TextWrapInterface {

  /**
   * {@inheritdoc}
   *
   * Apague o conteúdo do método abaixo e escreva sua própria implementação,
   * nós colocamos esse mock para poder rodar a análise de cobertura dos
   * testes unitários.
   */
  public function textWrap(string $text, int $length): array {

      {
          $escrita = '';
          $text = rtrim($text);
          for ($i=0;$i<=strlen($text);$i++){
              $escrita .= substr($text,$i,1);
              if (substr($text,$i,1) === ' '){
                  $array1[] = $escrita;
                  $escrita = ''; //insere as palavras em um array baseando-se nos espaços entre elas
              }
          }
          $array1[] = ltrim(strrchr($text,' ')); //adiciona a última palavra

          if (!$array1[0] && !is_null($text)){ //verifica se existe alguma palavra no array, caso não e tenha sido passado texto, insere a palavra
              $array1[0] = $text;
          }


          $x= 0; //contador do indice do array, para informar em qual posição inserir
          $stringFinal = '';

          //inicio passando palavra por palavra que armazenei no array1
          foreach ($array1 as $id => $palavra){
              //verifico que o tamanho da palavra + tamanho da string completa que irei inserir no array são maiores que o limite
              if (mb_strlen($palavra) + mb_strlen(trim($stringFinal)) <= $length){
                  $stringFinal .= $palavra;

              }
              //caso sejam, tento novamente retirando os espaços
              elseif (mb_strlen(trim($palavra)) + mb_strlen($stringFinal) <= $length){
                  $stringFinal .= $palavra;

              }
              //caso a palavra seja maior que o limite, inicia o processo de quebra da mesma.
              elseif(strlen(trim($palavra)) > $length){
                  //como a palavra já é maior que o limite, retiro os espaços
                  $palavra = trim($palavra);
                  $iLen = 0;
                  $fLen = 0;

                  //começo com meus 2 contadores para, passar por toda a palavra e quebrando ela assim que atinge o limite
                  while ($fLen <= mb_strlen($palavra)){
                      $fLen = $iLen; //inseri este contador, pois quando estava no final e atingia o limite do while, ele parava e não executava
                                    // a última vez.

                      if (!isset($arrayFinal)){ //verificação para, caso seja a primeira palavra, ele não pule o indice 0
                          $subtring = substr($palavra,$iLen,$length);
                          if ($subtring != ''){
                              $arrayFinal[$x] = $subtring;
                          }
                      }else{
                      $x++;
                      $subtring = substr($palavra,$iLen,$length);
                      if ($subtring != ''){
                          $arrayFinal[$x] = $subtring;
                      }}
                      $iLen += $length;
                      $stringFinal = null;
                  }
              }
              //Caso contrário, e a palavra esteja dentro do limite, ele adiciona na próxima linha
              else{
                  $stringFinal = null;
                  $stringFinal .= $palavra;
                  $x ++;
              }

              if (!is_null($stringFinal) || $stringFinal != ''){
                  $arrayFinal[$x] = trim($stringFinal);
              }

          }
          return $arrayFinal;
      }}}
