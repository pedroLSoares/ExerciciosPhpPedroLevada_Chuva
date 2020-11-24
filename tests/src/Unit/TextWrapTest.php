<?php

namespace Galoa\ExerciciosPhp\Tests\TextWrap;

use Galoa\ExerciciosPhp\TextWrap\Resolucao;
use PHPUnit\Framework\TestCase;

/**
 * Tests for Galoa\ExerciciosPhp\TextWrap\Resolucao.
 *
 * @codeCoverageIgnore
 */
class TextWrapTest extends TestCase {

  /**
   * Test Setup.
   */
  public function setUp() {
    $this->resolucao = new Resolucao();
    $this->baseString = "Se vi mais longe foi por estar de pé sobre ombros de gigantes";
  }

  /**
   * Checa o retorno para strings vazias.
   *
   * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
   */
  public function testForEmptyStrings() {
    $ret = $this->resolucao->textWrap("", 2021);
    $this->assertEmpty($ret[0]);
    $this->assertCount(1, $ret);
  }

  /**
   * Testa a quebra de linha para palavras curtas.
   *
   * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
   */
  public function testForSmallWords() {
    $ret = $this->resolucao->textWrap($this->baseString, 8);
    $this->assertEquals("Se vi", $ret[0]);
    $this->assertEquals("mais", $ret[1]);
    $this->assertEquals("longe", $ret[2]);
    $this->assertEquals("foi por", $ret[3]);
    $this->assertEquals("estar de", $ret[4]);
    $this->assertEquals("pé sobre", $ret[5]);
    $this->assertEquals("ombros", $ret[6]);
    $this->assertEquals("de", $ret[7]);
    $this->assertEquals("gigantes", $ret[8]);
    $this->assertCount(9, $ret);
  }

  /**
   * Testa a quebra de linha para palavras curtas.
   *
   * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
   */
  public function testForSmallWords2() {
    $ret = $this->resolucao->textWrap($this->baseString, 12);
    $this->assertEquals("Se vi mais", $ret[0]);
    $this->assertEquals("longe foi", $ret[1]);
    $this->assertEquals("por estar de", $ret[2]);
    $this->assertEquals("pé sobre", $ret[3]);
    $this->assertEquals("ombros de", $ret[4]);
    $this->assertEquals("gigantes", $ret[5]);
    $this->assertCount(6, $ret);
  }

    /**
     * Testa a quebra de linha com um limite maior.
     *
     * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
     */
    public function testForSmallWords3() {
        $ret = $this->resolucao->textWrap($this->baseString, 31);
        $this->assertEquals("Se vi mais longe foi por estar", $ret[0]);
        $this->assertEquals("de pé sobre ombros de gigantes", $ret[1]);
        $this->assertCount(2, $ret);
    }
    /**
     * Testa a quebra de linha para palavras com outra frase.
     *
     * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
     */
    public function testForAlternativeWords()
    {
        $ret = new Resolucao();
        $ret = $ret->textWrap('Meu nome é pedro e gostaria de realizar este teste com outra frase para verificar', 10);
        $this->assertEquals("Meu nome é", $ret[0]);
        $this->assertEquals("pedro e", $ret[1]);
        $this->assertEquals("gostaria", $ret[2]);
        $this->assertEquals("de", $ret[3]);
        $this->assertEquals("realizar", $ret[4]);
        $this->assertEquals("este teste", $ret[5]);
        $this->assertEquals("com outra", $ret[6]);
        $this->assertEquals("frase para", $ret[7]);
        $this->assertEquals("verificar", $ret[8]);
        $this->assertCount(9, $ret);
    }

    /**
     * Testa a quebra de linha para limite menor que palavra.
     *
     * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
     */
    public function testForAlternativeLength()
    {
        $ret = new Resolucao();
        $ret = $ret->textWrap('Meu nome é pedro', 3);
        $this->assertEquals("Meu", $ret[0]);
        $this->assertEquals("nom", $ret[1]);
        $this->assertEquals("e", $ret[2]);
        $this->assertEquals("é", $ret[3]);
        $this->assertEquals("ped", $ret[4]);
        $this->assertEquals("ro", $ret[5]);
        $this->assertCount(6, $ret);
    }
    /**
     * Testa retorno apenas com uma palavra
     *
     * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
     */
    public function testForOneWord()
    {
        $ret = new Resolucao();
        $ret = $ret->textWrap('Palavra', 10);
        $this->assertEquals("Palavra", $ret[0]);
        $this->assertCount(1, $ret);
    }
    /**
     * Testa quebra de linha com apenas com uma palavra
     *
     * @covers Galoa\ExerciciosPhp\TextWrap\Resolucao::textWrap
     */
    public function testForOneWord2()
    {
        $ret = new Resolucao();
        $ret = $ret->textWrap('Palavra', 4);
        $this->assertEquals("Pala", $ret[0]);
        $this->assertEquals("vra", $ret[1]);
        $this->assertCount(2, $ret);
    }





}
