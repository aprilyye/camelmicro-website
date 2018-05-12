<?php
include('includes/init.php');
include('includes/header.php');
$current_page = 'product.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel='stylesheet' href='styles/main.css'/>
  <title>Product</title>
</head>

<body>
  <div id="content-wrap">
    <article id="content">
      <h2 id="product-title">M2: 32-bit Mixed-Signal Processor</h2>
      <producth1>M2 is a CMOS Mixed Signal Processor (MSP) for intelligent
        medical/sensor applications with 32-bit embedded computing power.
        It provides a complete set of system modules to support embedded data
        acquisition, algorithm analysis, internal controlling, external interrupt,
        PWM, connectivity, and LCD driving. It also features analog configuration and
        calibration. </producth1>
      <img id="imgopen" class="productleft" alt="Image Upload" src="uploads/product.png" width="550" height="550"/>

      <h2 id="product-title2">Features</h2>
      <div class="panel">
        <producth3>Microprocessor Core Unit</producth3>
        <li>5-stage pipeline </li>
        <li>MIPS-II ISA</li>
        <li>2Kx32 bit boot ROM</li>
        <li>1M-bit embedded FLASH</li>
        <li>2Kx32 bit SRAM</li>
        <li>MMU with simple fixed mapping transition (FMT)</li>
        <li>1 cycle interrupt response with atomic control</li>

      <producth3>Peripheral System Unit</producth3>
        <li>Extendable external interrupt controller with atomic rise/fall edge control</li>
        <li>Power management with Battery low detection</li>
        <li>32-bit Timer/Event/Counter – 1-4 PWM Module</li>
        <li>12-bit V2P (Voltage to Pulse) Module</li>
        <li>16-bit Σ-∆ ADC and Digital Filter</li>
        <li>Low Noise Op-Amp with PGA and ZERO ADJUSTMENT</li>
        <li>Embedded 32-SEG x 4-COM LCD Driver</li>
        <li>Two UART/LIN Communication Modules</li>
        <li>SPI Communication Module</li>
        <li>Real-Time Clock (RTC) Module</li>
        <li>Pulse-Width Measurement Module</li>
        <li>Watch Dog Timer Module</li>

      <producth3>Software Development</producth3>
        <li>CamelStudio IDE</li>
      </div>

    </article>
  </div>
</body>
</html>
