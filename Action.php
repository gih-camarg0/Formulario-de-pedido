<?php
// Recebe os dados do formulário
$tamanho = $_POST['tamanho'];
$extra = isset($_POST['extra']) ? $_POST['extra'] : [];
$adicionais = isset($_POST['adicionais']) ? $_POST['adicionais'] : [];
$fruta = $_POST['frutas'];

// Preços de tamanhos
$precos_tamanho = [
    '300ml' => 9,
    '500ml' => 14,
    '700ml' => 18
];

// Preços dos adicionais
$precos_adicionais = [
    'leite-condensado' => 0,
    'leite-ninho' => 0,
    'chocoball' => 0,
    'granola' => 0,
    'paçoca' => 0,
    'nutella' => 0,
    'fini' => 0
];

// Preço das frutas
$precos_frutas = [
    'nenhuma' => 0,
    'morango' => 2,
    'banana' => 2,
    'pessego' => 2
];

// Calcula o total
$total = $precos_tamanho[$tamanho];

// Adiciona o preço dos adicionais
foreach ($adicionais as $adicional) {
    $total += $precos_adicionais[$adicional];
}

// Adiciona o preço da fruta
$total += $precos_frutas[$fruta];

// Exibe o resumo do pedido
echo "<h1>Resumo do Pedido</h1>";
echo "<p><strong>Tamanho:</strong> " . ucfirst($tamanho) . " (R$ " . number_format($precos_tamanho[$tamanho], 2, ',', '.') . ")</p>";

// Exibe os extras escolhidos
echo "<p><strong>Extras:</strong> " . (!empty($extra) ? implode(", ", $extra) : "Nenhum") . "</p>";

// Exibe os adicionais escolhidos
echo "<p><strong>Adicionais:</strong> " . (!empty($adicionais) ? implode(", ", $adicionais) : "Nenhum") . "</p>";

// Exibe a fruta escolhida
echo "<p><strong>Fruta:</strong> " . ucfirst($fruta) . " (R$ " . number_format($precos_frutas[$fruta], 2, ',', '.') . ")</p>";

// Exibe o total
echo "<h2>Total: R$ " . number_format($total, 2, ',', '.') . "</h2>";
?>
