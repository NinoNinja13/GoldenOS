<?php
/*
 ao usar este codigo estara concordando com os termos de serviços o codigo pode ser modificado porem não pode ser removido o credito do criado que é visivel na aba de configurações e nem remover o credito de ajuda das IA
 */
// session_start(); // Moved down to CONFIG section to avoid redundancy or just remove it if line 85 handles it

function render_svg_icon($name, $class = '')
{
    static $icons = [
    'cog' => ['vb' => '0 0 24 24', 'd' => 'M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.06-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.73,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.8,11.69,4.8,12s0.02,0.64,0.06,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.43-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.49-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z'],
    'clock' => ['vb' => '0 0 512 512', 'd' => 'M256 0c141.4 0 256 114.6 256 256s-114.6 256-256 256S0 397.4 0 256S114.6 0 256 0zM232 120V256c0 8 4.5 15.5 11.5 19l112 64c10.9 6.2 24.7 2.4 30.9-8.5s2.4-24.7-8.5-30.9L280 243.9V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z'],
    'calendar' => ['vb' => '0 0 448 512', 'd' => 'M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z'],
    'server' => ['vb' => '0 0 512 512', 'd' => 'M64 32C28.7 32 0 60.7 0 96v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM96 96H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zM64 288c-35.3 0-64 28.7-64 64v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V352c0-35.3-28.7-64-64-64H64zM416 352h32v64h-32V352z'],
    'music' => ['vb' => '0 0 512 512', 'd' => 'M499.1 6.3c8.1 4.6 12.9 13.3 12.9 22.7V352c0 61.9-50.1 112-112 112s-112-50.1-112-112s50.1-112 112-112c11.3 0 22.3 1.7 32 4.8V96L192 128V416c0 53-43 96-96 96s-96-43-96-96s43-96 96-96c11.3 0 22.3 1.7 32 4.8V32c0-10.3 6.2-19.6 15.6-23.4s20-1.5 27.2 5.8L499.1 6.3z'],
    'folder-open' => ['vb' => '0 0 576 512', 'd' => 'M528 224H117c-11.6 0-22.3 6.3-28.3 16.5L.2 375.8C-2.1 379.7 0.2 384 4.7 384h540.6c4.5 0 6.8-4.3 4.5-8.2L461.3 223.8c-6-10.2-16.7-16.5-28.3-16.5H480V160c0-26.5-21.5-48-48-48H224l-48-48H48C21.5 64 0 85.5 0 112v208h64V160c0-8.8 7.2-16 16-16h87.5l48 48H432c8.8 0 16 7.2 16 16v64z'],
    'backward' => ['vb' => '0 0 512 512', 'd' => 'M11.5 280.6l192 160c20.6 17.2 52.5 2.8 52.5-24.6V333.9l192 160c20.6 17.2 52.5 2.8 52.5-24.6V42.1c0-27.4-31.9-41.8-52.5-24.6l-192 160V113.1c0-27.4-31.9-41.8-52.5-24.6l-192 160c-15.3 12.8-15.3 36.4 0 49.1z'],
    'play' => ['vb' => '0 0 448 512', 'd' => 'M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z'],
    'pause' => ['vb' => '0 0 448 512', 'd' => 'M144 479H48c-26.5 0-48-21.5-48-48V79c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zm320 0h-96c-26.5 0-48-21.5-48-48V79c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48z'],
    'forward' => ['vb' => '0 0 512 512', 'd' => 'M11.5 280.6l192 160c20.6 17.2 52.5 2.8 52.5-24.6V333.9l192 160c20.6 17.2 52.5 2.8 52.5-24.6V42.1c0-27.4-31.9-41.8-52.5-24.6l-192 160V113.1c0-27.4-31.9-41.8-52.5-24.6l-192 160c-15.3 12.8-15.3 36.4 0 49.1z'],
    'list' => ['vb' => '0 0 512 512', 'd' => 'M0 96C0 78.3 14.3 64 32 64H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z'],
    'th' => ['vb' => '0 0 512 512', 'd' => 'M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm96 64H224V256H96V160zm0 160H224v96H96V320zm160 0H384v96H256V320zm160-160H256V256H384V160z'],
    'globe' => ['vb' => '0 0 512 512', 'd' => 'M0 256c0 141.4 114.6 256 256 256s256-114.6 256-256S397.4 0 256 0 0 114.6 0 256zm256 160c-24.5 0-48-5.3-69.2-14.8C200.2 376.6 216 348.1 216 316c0-44.2-35.8-80-80-80-14.3 0-27.7 3.8-39.2 10.3C91.4 210.5 88 174.6 88 136c0-26 1.7-51.6 5-76.6C131.7 41.6 189.9 24 256 24c134.4 0 243.6 103.4 254.9 234.3C505.5 259.8 496 264 496 264c-22.1 0-40-17.9-40-40 0-44.2-35.8-80-80-80-26 0-49 12.4-63.5 31.6-1.5 1.9-2.9 3.9-4.1 6-13.3 22.8-12.4 51 3.1 72.8 11.2 15.8 11.2 36.6 0 52.4-11.5 16.3-29.6 25.1-48.9 24.3-17.5-.7-32.9-12.2-38.6-28.7-2.6-7.7-2.6-16.1 0-23.8 5.7-16.5 21.1-28 38.6-28.7 13-.5 25.1 5.4 33.1 15.1 3.5 4.3 8.7 6.9 14.2 6.9 10.4 0 18.8-8.4 18.8-18.8 0-4.6-1.7-9.1-4.7-12.6C309.2 122 284 104 256 104c-44.2 0-80 35.8-80 80 0 26 12.4 49 31.6 63.5 1.9 1.5 3.9 2.9 6 4.1 22.8 13.3 51 12.4 72.8-3.1 15.8-11.2 36.6-11.2 52.4 0 16.3 11.5 25.1 29.6 24.3 48.9-.7 17.5-12.2 32.9-28.7 38.6-7.7 2.6-16.1 2.6-23.8 0-16.5-5.7-28-21.1-28.7-38.6-.5-13 5.4-25.1 15.1-33.1 4.3-3.5 6.9-8.7 6.9-14.2 0-10.4-8.4-18.8-18.8-18.8-4.6 0-9.1 1.7-12.6 4.7C218 202.8 200 228 200 256c0 44.2 35.8 80 80 80 13 0 25.1-3.1 35.9-8.6 15 25.6 24.1 55.4 24.1 87.2 0 18.1-2.9 35.5-8.2 51.8-21.3 26.2-52 43.6-86.8 48.3-2.6.4-5.2.7-7.9.9C215.1 513.7 188.7 512 160 512 71.6 512 0 440.4 0 352c0-11.9 1.3-23.5 3.8-34.7C16.9 270.3 58.7 229.4 110.1 209.6c4-1.5 8.1-2.6 12.3-3.2 26.5-3.8 52.2 7.7 66.8 29.7 11.2 16.9 11.2 38.8 0 55.7-9.5 14.4-25 22.3-41.5 22.3-5.2 0-10.4-.8-15.4-2.4C117 307.2 104 286.3 104 264c0-4.4.4-8.7 1.2-13-16.3 4.2-30.8 13.9-40.6 27.2-2.5 3.4-4.7 7-6.5 10.8C54 297.8 52 306.8 52 316c0 30.9 25.1 56 56 56 12.3 0 23.7-3.9 33.1-10.6C153.2 385 174.5 400 200 400c44.2 0 80-35.8 80-80 0-13-3.1-25.1-8.6-35.9 25.6-15 55.4-24.1 87.2-24.1 18.1 0 35.5 2.9 51.8 8.2-12 11.6-20.9 25.9-25.7 41.8-6.1 20-3.3 41.5 7.8 59.2 12.6 20 12.6 45.4 0 65.4-11.6 18.5-30.4 28.9-50.6 28.5-17.7-.3-33.4-11.2-39.7-27.7-2.9-7.6-3.2-15.9-1-23.7 4.7-16.8 20-29 37.6-30.2 18.1-1.3 34.6 10.6 39.5 28.2 1.2 4.3 4.9 7.4 9.4 7.7 5.2.3 9.7-3.4 10.5-8.6.6-4.2-.4-8.5-2.8-12-11.2-16.1-29.2-26-49.1-26.4-19.1-.4-37 7.5-49.1 21.6-.9 1-1.8 2.1-2.6 3.2-11.2 15.8-11.2 36.6 0 52.4 13.3 18.9 34.6 28.6 56.6 25.8 20.8-2.6 37.8-17.4 44.5-37.1.9-2.7 1.6-5.5 2-8.3C402.7 325.2 344 264 272 264c-13.3 0-24 10.7-24 24s10.7 24 24 24c44.2 0 80 35.8 80 80 0 13-3.1-25.1-8.6-35.9 25.6-15-55.4-24.1-87.2-24.1-18.1 0-35.5-2.9-51.8-8.2-11.6 12-25.9 20.9-41.8 25.7-20 6.1-41.5 3.3-59.2-7.8-20-12.6-45.4-12.6-65.4 0-18.5 11.6-28.9 30.4-28.5 50.6.3 17.7 11.2 33.4 27.7 39.7 7.6 2.9 15.9 3.2 23.7 1 16.8-4.7 29-20 30.2-37.6 1.3-18.1-10.6-34.6-28.2-39.5-4.3-1.2-7.4-4.9-7.7-9.4-.3-5.2 3.4-9.7 8.6-10.5 4.2-.6 8.5.4 12 2.8 16.1 11.2 26 29.2 26.4 49.1.4 19.1-7.5 37-21.6 49.1-1 .9-2.1 1.8-3.2 2.6-15.8 11.2-36.6 11.2-52.4 0-18.9-13.3-28.6-34.6-25.8-56.6 2.6-20.8 17.4-37.8 37.1-44.5 2.7-.9 5.5-1.6 8.3-2z'],
    'download' => ['vb' => '0 0 512 512', 'd' => 'M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64z'],
    'gamepad' => ['vb' => '0 0 512 512', 'd' => 'M0 192C0 147.8 35.8 112 80 112H432c44.2 0 80 35.8 80 80V400c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V192zM128 256c0-13.3-10.7-24-24-24s-24 10.7-24 24v32H48c-13.3 0-24 10.7-24 24s10.7 24 24 24H80v32c0 13.3 10.7 24 24 24s24-10.7 24-24V336h32c13.3 0 24-10.7 24-24s-10.7-24-24-24H128V256zm256 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm64 64a32 32 0 1 0 0-64 32 32 0 1 0 0 64z'],
    'plus-circle' => ['vb' => '0 0 512 512', 'd' => 'M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z'],
    'trash' => ['vb' => '0 0 448 512', 'd' => 'M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64s14.3-32 32-32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z'],
    'edit' => ['vb' => '0 0 512 512', 'd' => 'M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0z'],
    'external-link-alt' => ['vb' => '0 0 512 512', 'd' => 'M432 320c-13.3 0-24 10.7-24 24v112H64V104h112c13.3 0 24-10.7 24-24s-10.7-24-24-24H48C21.5 56 0 77.5 0 104V464c0 26.5 21.5 48 48 48H408c26.5 0 48-21.5 48-48V344c0-13.3-10.7-24-24-24zm56-320H320c-13.3 0-24 10.7-24 24s10.7 24 24 24h62.1L182 248c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0L416 81.9V144c0 13.3 10.7 24 24 24s24-10.7 24-24V24c0-13.3-10.7-24-24-24z'],
    'link' => ['vb' => '0 0 512 512', 'd' => 'M326.6 230.9l-54.6 54.6c-6.2 6.2-16.4 6.2-22.6 0l-10.4-10.4c-6.2-6.2-6.2-16.4 0-22.6l54.6-54.6c6.2-6.2 16.4-6.2 22.6 0l10.4 10.4c6.2 6.2 6.2 16.4 0 22.6zm70.2-70.2l-54.6 54.6c-6.2 6.2-16.4 6.2-22.6 0l-10.4-10.4c-6.2-6.2-6.2-16.4 0-22.6l54.6-54.6c6.2-6.2 16.4-6.2 22.6 0l10.4 10.4c6.2 6.2 6.2 16.4 0 22.6z'],
    'android' => ['vb' => '0 0 576 512', 'd' => 'M420.6 301.9c0-12.7-10.3-23-23-23s-23 10.3-23 23c0 12.7 10.3 23 23 23s23-10.3 23-23zm-153.2 0c0-12.7-10.3-23-23-23s-23 10.3-23 23c0 12.7 10.3 23 23 23s23-10.3 23-23zm136.2-109.1c-1.3-1.6-3.3-2.6-5.4-2.6h-212c-2.1 0-4.1 1-5.4 2.6c-1.3 1.6-1.7 3.8-1 5.7s2.5 3.5 4.5 4.2c26.2 8.3 54.2 12.6 82.5 12.6s56.3-4.3 82.5-12.6c2-.7 3.7-2.3 4.5-4.2s.4-4.1-1-5.7z'],
    'inbox' => ['vb' => '0 0 576 512', 'd' => 'M576 240c0-23.5-19.1-42.7-42.7-42.7H416l-72.3-115.7c-13.7-21.9-39.5-36.4-68.3-36.4H42.7C19.1 45.3 0 64.5 0 88V424c0 23.5 19.1 42.7 42.7 42.7h490.7c23.5 0 42.7-19.1 42.7-42.7V240zm-320-16h128v128c0 35.3-28.7 64-64 64s-64-28.7-64-64V224z'],
    'search' => ['vb' => '0 0 512 512', 'd' => 'M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zm-312 0c0 57.4 46.6 104 104 104s104-46.6 104-104s-46.6-104-104-104s-104 46.6-104 104z'],
    'th-large' => ['vb' => '0 0 512 512', 'd' => 'M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM320 288V416h128V288H320zm0-192V224h128V96H320zM64 288V416H192V288H64zM64 96V224H192V96H64z'],
    'image' => ['vb' => '0 0 512 512', 'd' => 'M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM320 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM448 352l-128-128L256 288l-64-64L64 352v64H448V352z'],
    'palette' => ['vb' => '0 0 512 512', 'd' => 'M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM80 256a24 24 0 1 0 48 0 24 24 0 1 0 -48 0zm112-72a24 24 0 1 0 0-48 24 24 0 1 0 0 48zm120 0a24 24 0 1 0 0-48 24 24 0 1 0 0 48zm112 72a24 24 0 1 0 -48 0 24 24 0 1 0 48 0zM256 368c53 0 96-43 96-96c0-17.7-14.3-32-32-32s-32 14.3-32 32c0 17.7-14.3 32-32 32s-32-14.3-32-32c0-53 43-96 96-96c17.7 0 32-14.3 32-32s-14.3-32-32-32c-88.4 0-160 71.6-160 160s71.6 160 160 160z'],
    'eye-slash' => ['vb' => '0 0 512 512', 'd' => 'M432 448L84.8 100.8C35.5 141.5 0 207.1 0 256c0 106 86 192 192 192c48.9 0 92.5-18.4 125.1-48.8L432 448zM192 384c-70.7 0-128-57.3-128-128c0-34.8 13.9-66.3 36.4-89.4l26.2 26.2c-10.4 17.7-16.6 38.3-16.6 63.2c0 68.5 55.5 124 124 124c24.9 0 45.5-6.2 63.2-16.6l26.2 26.2c-23.1 22.5-54.6 36.4-89.4 36.4z'],
    'exclamation-triangle' => ['vb' => '0 0 512 512', 'd' => 'M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1s-20.1 20.1-34.5 20.1H40c-14.4 0-27.4-7.7-34.5-20.1s-7.1-27.7 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z'],
    'magic' => ['vb' => '0 0 512 512', 'd' => 'M4.3 20.7c-5.7-5.7-5.7-15.1 0-20.8s15.1-5.7 20.8 0l112 112c5.7 5.7 5.7 15.1 0 20.8s-15.1 5.7-20.8 0l-112-112zM320 0c17.7 0 32 14.3 32 32V256c0 17.7-14.3 32-32 32s-32-14.3-32-32V32c0-17.7 14.3-32 32-32zM507.7 20.7c5.7-5.7 5.7-15.1 0-20.8s-15.1-5.7-20.8 0l-112 112c-5.7 5.7-5.7 15.1 0 20.8s15.1 5.7 20.8 0l112-112zM0 320c0-17.7 14.3-32 32-32H256c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM480 288c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32s14.3-32 32-32H480zM362.3 362.3c5.7-5.7 15.1-5.7 20.8 0l112 112c5.7 5.7 5.7 15.1 0 20.8s-15.1 5.7-20.8 0l-112-112c-5.7-5.7-5.7-15.1 0-20.8zM149.7 362.3c5.7 5.7 5.7 15.1 0 20.8l-112 112c-5.7 5.7-15.1 5.7-20.8 0s-5.7-15.1 0-20.8l112-112c5.7-5.7 15.1-5.7 20.8 0z'],
    'upload' => ['vb' => '0 0 512 512', 'd' => 'M105 204.3c-7.9-7.9-7.9-20.6 0-28.5L241.7 39.1c7.9-7.9 20.6-7.9 28.5 0L406.8 175.7c7.9 7.9 7.9 20.6 0 28.5s-20.6 7.9-28.5 0L241.7 84.8V448c0 11.2-9.1 20.3-20.3 20.3s-20.3-9.1-20.3-20.3V84.8L133.5 204.3c-7.9 7.9-20.6 7.9-28.5 0z'],
    'film' => ['vb' => '0 0 512 512', 'd' => 'M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM320 288V416h128V288H320zm0-192V224h128V96H320zM64 288V416H192V288H64zM64 96V224H192V96H64z'],
    'dock' => ['vb' => '0 0 512 512', 'd' => 'M48 64C21.5 64 0 85.5 0 112V400c0 26.5 21.5 48 48 48H464c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H48zM448 352v32H64V352H448z'],
    'th-list' => ['vb' => '0 0 512 512', 'd' => 'M0 96C0 78.3 14.3 64 32 64H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z'],
    'chevron-left' => ['vb' => '0 0 320 512', 'd' => 'M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z'],
    'chevron-right' => ['vb' => '0 0 320 512', 'd' => 'M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z'],
    'minus' => ['vb' => '0 0 448 512', 'd' => 'M0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32z'],
    'letter-g' => ['vb' => '0 0 448 512', 'd' => 'M0 48v416c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48zm352 240c0 17.7-14.3 32-32 32h-64c-17.7 0-32-14.3-32-32V192c0-17.7 14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32h-64v64h32c17.7 0 32 14.3 32 32z']
    ];

    $aliases = [
        'calendar-alt' => 'calendar',
        'th-large' => 'th-large',
        'magnifying-glass' => 'search',
        'table-cells' => 'th',
        'wand-magic' => 'magic',
        'triangle-exclamation' => 'exclamation-triangle',
        'up-right-from-square' => 'external-link-alt',
        'box' => 'inbox',
        'gear' => 'cog',
        'th' => 'th',
        'th-list' => 'th-list',
        'search' => 'search',
        'desktop' => 'dock',
        'palette' => 'palette',
        'eye-slash' => 'eye-slash',
        'minus' => 'minus',
        'letter-g' => 'letter-g'
    ];

    $name = str_replace(['fa-', 'fas ', 'far ', 'fab ', 'fa-solid ', 'fa-brands '], '', $name);
    $name = trim($name);
    if (isset($aliases[$name]))
        $name = $aliases[$name];

    if (!isset($icons[$name]))
        return "<!-- Icon $name not found -->";

    $icon = $icons[$name];
    $vb = isset($icon['vb']) ? $icon['vb'] : '0 0 512 512';
    return sprintf(
        "<svg class='svg-icon icon-%s %s' viewBox='%s' fill='currentColor'><path d='%s'/></svg>",
        $name,
        $class,
        $vb,
        $icon['d']
    );
}

// ============================================================
// CONFIG
// ============================================================
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$apps_file = __DIR__ . '/apps.json';

if (!file_exists(__DIR__ . '/assets'))
    @mkdir(__DIR__ . '/assets', 0777, true);
if (!file_exists(__DIR__ . '/icons'))
    @mkdir(__DIR__ . '/icons', 0777, true);
if (!file_exists(__DIR__ . '/wallpapers'))
    @mkdir(__DIR__ . '/wallpapers', 0777, true);

// ============================================================
// LOGIC
// ============================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Carregar aplicativos
$apps = ['apps' => [], 'downloads' => [], 'webs' => [], 'games' => []];
if (file_exists($apps_file)) {
    $decoded = json_decode(file_get_contents($apps_file), true);
    if (is_array($decoded)) {
        foreach (['apps', 'downloads', 'webs', 'games'] as $cat) {
            if (isset($decoded[$cat]) && is_array($decoded[$cat])) {
                $apps[$cat] = $decoded[$cat];
            }
        }
    }
}

// Categoria ativa
$active_category = 'apps';
if (isset($_GET['category']) && in_array($_GET['category'], ['apps', 'downloads', 'webs', 'games'])) {
    $active_category = $_GET['category'];
}

// Verificar primeira visita
if (!isset($_SESSION['visited'])) {
    $_SESSION['visited'] = true;
    $showAnimation = true;
}
else {
    $showAnimation = false;
}

// Listar wallpapers estáticos
$wallpapersDir = 'wallpapers/';
$wallpapers = [];
if (is_dir($wallpapersDir)) {
    foreach (scandir($wallpapersDir) as $file) {
        if ($file !== '.' && $file !== '..' && preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)) {
            $wallpapers[] = $wallpapersDir . $file;
        }
    }
}

// Listar wallpapers animados (via index.json)
$animatedWallpapers = [];
$animatedIndex = $wallpapersDir . 'index.json';
if (file_exists($animatedIndex)) {
    $indexData = json_decode(file_get_contents($animatedIndex), true);
    $animatedWallpapers = $indexData['wallpapers'] ?? [];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoldenOS</title>
    <style>
        :root {
            --gold: #FFD700;
            --gold-light: #ffe866;
            --gold-dark: #e6c200;
            --gold-glow: rgba(255, 215, 0, 0.3);
            --dark: #121212;
            --darker: #0a0a0a;
            --light: #f5f5f5;
            --glass: rgba(255, 255, 255, 0.05);
            --glass-light: rgba(255, 255, 255, 0.1);
            --glass-border: var(--gold-glow);
            --apps-color: #4CAF50;
            --downloads-color: #2196F3;
            --webs-color: #9c27b0;
            --app-text-color: #ffffff;
        }

        /* Premium Elegant Minimalist Scrollbar */
        ::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            transition: background 0.2s;
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: rgba(255, 255, 255, 0.4);
        }

        /* Firefox support */
        * {
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.2) transparent;
        }

        .svg-icon {
            width: 1.1em;
            height: 1.1em;
            fill: currentColor;
            display: inline-block;
            vertical-align: middle;
            position: relative;
            top: -1px;
        }

        /* Focus Style for Gamepad/Remote Navigation */
        .nav-focus {
            outline: none !important;
            box-shadow: 0 0 0 3px var(--gold), 0 0 15px var(--gold-glow) !important;
            transform: scale(1.05);
            z-index: 1000 !important;
            border-color: var(--gold) !important;
            background: var(--gold-glow) !important;
        }

        .category-tab.nav-focus {
            background: var(--gold-glow) !important;
            border-color: var(--gold) !important;
        }

        .app-item.nav-focus .app-icon {
            border-color: var(--gold) !important;
            box-shadow: 0 0 15px var(--gold-glow) !important;
        }

        /* Fix for flex centering to avoid crooked/crooked look */
        .dex-win-btn .svg-icon,
        .music-btn .svg-icon,
        .flex-center .svg-icon {
            vertical-align: unset;
            top: unset;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        html,
        body {
            height: 100%;
            overflow-x: hidden;
        }

        body {
            background: linear-gradient(135deg, #0f0f0f, #1a1a1a);
            color: var(--light);
            min-height: 100%;
            position: relative;
            /* No z-index here to avoid creating a root stacking context that obscures children */
        }

        body.custom-wallpaper {
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }


        #startup-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(-45deg, #1a1a1a, #0f0f0f, #1a1a1a, #0f0f0f);
            background-size: 400% 400%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2147483647 !important;
            transition: opacity 0.5s ease;
            animation: gradientBG 10s ease infinite;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 50%
            }

            100% {
                background-position: 0% 50%
            }
        }

        .logo-animation {
            text-align: center;
            position: relative;
        }

        .logo-text {
            font-size: 3.5rem;
            font-weight: bold;
            color: var(--gold);
            letter-spacing: 2px;
            margin-bottom: 30px;
            opacity: 0;
            animation: fadeInUp 0.6s forwards 0.2s, pulse 2s infinite 1s;
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
        }

        @keyframes pulse {
            0% {
                text-shadow: 0 0 0 rgba(255, 215, 0, 0.5)
            }

            50% {
                text-shadow: 0 0 20px rgba(255, 215, 0, 0.8)
            }

            100% {
                text-shadow: 0 0 0 rgba(255, 215, 0, 0.5)
            }
        }

        .loader {
            width: 60px;
            height: 60px;
            position: relative;
            margin: 0 auto;
        }

        .loader-circle {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 3px solid transparent;
            border-top-color: var(--gold);
            border-radius: 50%;
            animation: spin 1.2s linear infinite;
        }

        .loader-circle:nth-child(2) {
            border: 3px solid transparent;
            border-bottom-color: var(--gold);
            animation: spinReverse 1.2s linear infinite;
        }

        #main-content {
            opacity: 0;
            animation: fadeIn 0.8s forwards 0.4s;
            display: none;
            position: relative;
            z-index: 10;
        }

        @keyframes fadeIn {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(15px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg)
            }

            100% {
                transform: rotate(360deg)
            }
        }

        @keyframes spinReverse {
            0% {
                transform: rotate(0deg)
            }

            100% {
                transform: rotate(-360deg)
            }
        }

        /* ---- GoldenDex Mode ---- */
        body.dex-mode {
            height: 100vh;
            height: 100dvh;
            width: 100vw;
            overflow: hidden;
            position: fixed;
            top: 0;
            left: 0;
        }

        body.dex-mode header,
        body.dex-mode .categories,
        body.dex-mode .apps-grid,
        body.dex-mode .classic-search,
        body.dex-mode #dock-container {
            display: none !important;
        }

        #dex-desktop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: calc(100% - 50px);
            z-index: 10;
            display: none;
            overflow: hidden;
            pointer-events: none;
        }

        body.dex-mode #dex-desktop {
            display: block;
            pointer-events: auto;
        }

        body.dex-mode {
            overflow: hidden !important;
            height: 100% !important;
            width: 100%;
            margin: 0;
        }

        html.dex-mode {
            overflow: hidden !important;
            height: 100% !important;
        }

        .dex-desktop-icon {
            width: 80px;
            height: 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border-radius: 10px;
            padding: 5px;
            text-align: center;
            border: 1px solid transparent;
            transition: transform 0.1s ease, opacity 0.2s;
            pointer-events: auto;
            position: absolute;
            user-select: none;
            touch-action: none;
        }

        .dex-desktop-icon.dragging {
            opacity: 0.5;
            z-index: 10000;
            transition: none;
        }

        .dex-desktop-icon.trash-bin {
            background: transparent;
            transform: scale(1.1);
            transition: opacity 0.3s ease, transform 0.1s ease;
        }

        .dex-desktop-icon.trash-bin.drag-over {
            background: rgba(255, 0, 0, 0.2);
            border-color: #ff5555;
            transform: scale(1.1);
        }

        .dex-desktop-icon:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .dex-desktop-icon img {
            width: 48px;
            height: 48px;
            object-fit: contain;
            margin-bottom: 8px;
            filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.5));
        }

        .dex-desktop-icon i {
            font-size: 38px;
            color: var(--gold);
            margin-bottom: 8px;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        }

        .dex-desktop-icon span {
            color: var(--app-text-color);
            font-size: 0.8rem;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.8);
            line-height: 1.2;
            word-break: break-word;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        body.hide-app-names .app-name,
        body.hide-app-names .dex-desktop-icon span,
        body.hide-app-names .dex-start-app span,
        body.hide-app-names .dex-taskbar-item span {
            display: none !important;
        }

        body.hide-app-names .dex-taskbar-item {
            padding: 0 10px;
            width: 42px;
            justify-content: center;
        }

        .dex-desktop-icon img,
        .dex-start-app img {
            pointer-events: none;
            user-select: none;
            -webkit-user-drag: none;
        }

        .dex-desktop-icon,
        .dex-start-app {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            user-select: none;
        }

        #dex-taskbar {
            position: fixed;
            bottom: 0;
            bottom: env(safe-area-inset-bottom);
            left: 0;
            width: 100%;
            height: 50px;
            background: rgba(15, 15, 15, 0.85);
            backdrop-filter: blur(15px);
            border-top: 1px solid var(--gold-glow);
            z-index: 2147483647;
            display: none;
            align-items: center;
            justify-content: space-between;
            padding: 0 10px;
            box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.5);
            user-select: none;
            -webkit-user-select: none;
        }

        body.dex-mode #dex-taskbar {
            display: flex !important;
        }

        .dex-start-btn {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            /* Prevent button from being compressed */
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            font-size: 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s;
            background: transparent;
            border: none;
            outline: none;
        }

        .dex-start-btn:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .dex-taskbar-apps {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 0 15px;
            overflow-x: auto;
            height: 100%;
            scrollbar-width: none;
        }

        .dex-taskbar-apps::-webkit-scrollbar {
            display: none;
        }

        .dex-taskbar-favorites {
            display: flex;
            align-items: center;
            gap: 2px;
            padding: 0 10px;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            margin-right: 5px;
        }

        .dex-fav-item {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.2s;
            background: rgba(255, 255, 255, 0.03);
        }

        .dex-fav-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .dex-fav-item img,
        .dex-fav-item .svg-icon {
            width: 20px;
            height: 20px;
            object-fit: contain;
        }

        .dex-taskbar-item {
            height: 38px;
            padding: 0 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            cursor: pointer;
            transition: 0.2s;
            color: white;
            font-size: 0.85rem;
            max-width: 150px;
        }

        .dex-taskbar-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .dex-taskbar-item.active {
            background: var(--gold-glow);
            border-color: var(--gold);
        }

        .dex-taskbar-item img,
        .dex-taskbar-item i {
            width: 18px;
            height: 18px;
            font-size: 16px;
            object-fit: contain;
        }

        .dex-taskbar-item span {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .dex-system-tray {
            display: flex;
            align-items: center;
            gap: 15px;
            color: var(--light);
            font-size: 0.9rem;
            padding: 0 10px;
            flex-shrink: 0;
            /* Prevent the tray from being compressed */
        }

        .dex-system-tray i {
            cursor: pointer;
            transition: 0.2s;
            color: rgba(255, 255, 255, 0.7);
        }

        .dex-system-tray i:hover {
            color: var(--gold);
        }

        .dex-system-tray div {
            cursor: pointer;
            padding: 8px 10px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s, color 0.2s;
            color: rgba(255, 255, 255, 0.7);
            min-width: 36px;
            min-height: 36px;
        }

        .dex-system-tray div:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--gold);
        }

        .dex-system-tray div .svg-icon {
            pointer-events: none;
        }

        .dex-clock {
            font-size: 0.85rem;
            font-weight: 500;
            cursor: default;
        }

        #dex-start-menu {
            position: absolute;
            bottom: 60px;
            left: 10px;
            width: 400px;
            height: 500px;
            background: rgba(20, 20, 20, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
            z-index: 999;
            display: none;
            flex-direction: column;
            overflow: hidden;
            padding: 15px;
            transform-origin: bottom left;
            transform: scale(0.95);
            opacity: 0;
            transition: all 0.2s ease;
        }

        #dex-start-menu.show {
            display: flex;
            transform: scale(1);
            opacity: 1;
        }

        .dex-search {
            display: flex;
            align-items: center;
            background: #141414;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 8px 12px;
            margin-bottom: 10px;
            position: sticky;
            top: 0;
            z-index: 100;
            flex-shrink: 0;
            /* Anti-crush */
        }

        .dex-search .svg-icon {
            color: var(--gold);
            margin-right: 10px;
            width: 18px;
            height: 18px;
        }

        .dex-search input {
            background: transparent;
            border: none;
            color: white;
            width: 100%;
            outline: none;
            font-size: 0.95rem;
        }

        .dex-start-categories {
            display: flex;
            gap: 5px;
            margin-bottom: 15px;
            overflow-x: auto;
            padding-bottom: 8px;
            scrollbar-width: none;
            position: sticky;
            top: 45px;
            z-index: 99;
            background: #141414;
            padding-top: 5px;
            flex-shrink: 0;
            /* Anti-crush */
        }

        .dex-start-cat-btn {
            padding: 6px 12px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid transparent;
            border-radius: 15px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.8rem;
            cursor: pointer;
            white-space: nowrap;
            transition: 0.2s;
        }

        .dex-start-cat-btn.active {
            background: var(--gold-glow);
            color: var(--gold);
            border-color: var(--gold);
        }

        .dex-start-apps {
            flex: 1;
            overflow-y: auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            align-content: flex-start;
            padding-right: 5px;
            position: relative;
            z-index: 1;
        }

        .dex-start-app {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            padding: 10px 5px;
            cursor: pointer;
            border-radius: 8px;
            transition: 0.2s;
            text-align: center;
            min-width: 0;
            width: 100%;
        }

        .dex-start-app:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .dex-start-app img {
            width: 36px;
            height: 36px;
            object-fit: contain;
        }

        .dex-start-app .svg-icon {
            width: 28px;
            height: 28px;
            color: var(--gold);
        }

        .dex-start-app span {
            color: var(--app-text-color);
            font-size: 0.75rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
        }

        #dex-windows-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: calc(100% - 50px);
            pointer-events: none;
            z-index: 500;
            display: none;
            overflow: hidden;
        }

        body.dex-mode #dex-windows-container {
            display: block;
            pointer-events: none;
        }

        .dex-window {
            position: absolute;
            width: 800px;
            height: 500px;
            background: #fff;
            border-radius: 8px;
            border: 1.5px solid var(--gold);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5), 0 0 0 1px var(--gold-glow);
            display: flex;
            flex-direction: column;
            pointer-events: auto;
            overflow: hidden;
            transition: transform 0.2s, opacity 0.2s, width 0.2s, height 0.2s, top 0.2s, left 0.2s;
        }

        .dex-window.no-transition {
            transition: none !important;
        }

        .dex-window.maximized {
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            height: 100% !important;
            border-radius: 0;
        }

        .dex-window.minimized {
            transform: scale(0.8) translateY(100px);
            opacity: 0;
            pointer-events: none;
        }

        .dex-window-header {
            height: 36px;
            background: #111;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 15px;
            cursor: move;
            border-bottom: 1px solid #333;
            user-select: none;
        }

        .dex-window-title {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-size: 0.85rem;
            font-weight: 500;
            min-width: 0;
            overflow: hidden;
            white-space: nowrap;
        }

        @container window (max-width: 300px) {
            .dex-window-title span {
                display: none;
            }
        }

        @container window (max-width: 200px) {
            .dex-window-title {
                display: none;
            }
        }

        .dex-window-title img,
        .dex-window-title i {
            width: 16px;
            height: 16px;
            font-size: 14px;
            object-fit: contain;
        }

        .dex-window-controls {
            display: flex;
            align-items: center;
            gap: 5px;
            flex-shrink: 0;
            overflow-x: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
            flex-direction: row-reverse;
            /* Pin scroll to the right (Close button) */
            max-width: 70%;
        }

        .dex-window-controls::-webkit-scrollbar {
            display: none;
        }

        .dex-win-btn {
            width: 26px;
            height: 26px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 4px;
            transition: 0.2s;
            font-size: 0.75rem;
        }

        .dex-win-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .dex-win-btn.close:hover {
            background: #e81123;
            color: white;
        }

        .dex-window-content {
            flex: 1;
            position: relative;
            background: #f0f0f0;
            display: flex;
        }

        .dex-window-content iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            background: white;
            flex: 1;
        }

        .dex-window-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10;
            display: none;
        }

        /* ---- Responsive Mode ---- */
        @media screen and (max-width: 768px) {
            .dex-window {
                width: 95vw;
                height: 70vh;
                position: fixed;
            }

            .dex-window.maximized {
                width: 100vw !important;
                height: 100% !important;
                top: 0 !important;
                left: 0 !important;
                transform: none !important;
            }

            #dex-start-menu {
                width: calc(100% - 20px) !important;
                max-width: 400px;
                left: 10px !important;
                height: auto !important;
                max-height: 80vh !important;
                position: fixed !important;
                bottom: calc(60px + env(safe-area-inset-bottom)) !important;
            }

            /* Responsive Desktop Icons */
            .dex-desktop-icon {
                width: 64px !important;
                height: 85px !important;
            }

            .dex-desktop-icon img {
                width: 38px !important;
                height: 38px !important;
            }

            .dex-desktop-icon i {
                font-size: 32px !important;
            }

            .dex-desktop-icon span {
                font-size: 0.7rem !important;
            }

            .dex-desktop-icon.trash-bin {
                transform: scale(1) !important;
            }
        }

        @media screen and (max-height: 500px) and (orientation: landscape) {
            .dex-desktop-icon {
                width: 56px !important;
                height: 75px !important;
            }

            .dex-desktop-icon img {
                width: 32px !important;
                height: 32px !important;
            }

            .dex-desktop-icon i {
                font-size: 28px !important;
            }

            .dex-desktop-icon span {
                font-size: 0.65rem !important;
            }
        }

        @media screen and (max-width: 768px) {
            .dex-system-tray {
                gap: 8px !important;
                padding: 0 5px !important;
            }

        }

        @media screen and (max-width: 1024px) {

            /* Universal Mobile Categories Scroll (Classic Mode) */
            .categories {
                justify-content: flex-start !important;
                overflow-x: auto !important;
                padding: 10px 15px !important;
                scrollbar-width: none !important;
                -ms-overflow-style: none !important;
                flex-wrap: nowrap !important;
                -webkit-overflow-scrolling: touch;
            }

            .categories::-webkit-scrollbar {
                display: none !important;
            }

            .category-tab {
                flex: 0 0 auto !important;
                min-width: 110px !important;
                padding: 12px 15px !important;
            }

            @media screen and (max-width: 600px) {

                .dex-system-tray div:nth-child(2),
                .dex-system-tray div:nth-child(3) {
                    display: none !important;
                    /* Hide ping and calendar ONLY on very small (portrait) screens */
                }
            }

            @media screen and (max-width: 400px) {
                #dex-tray-music {
                    display: none !important;
                    /* Hide music on very narrow screens */
                }

                .dex-system-tray {
                    gap: 4px !important;
                    padding: 0 2px !important;
                }

                .dex-taskbar-favorites {
                    padding: 0 2px !important;
                    gap: 2px !important;
                    margin-right: 2px !important;
                }

                .dex-taskbar-apps {
                    padding: 0 5px !important;
                }
            }

            .dex-taskbar-favorites {
                padding: 0 5px !important;
                gap: 5px !important;
            }

            .settings-panel {
                width: min(320px, 90vw) !important;
                right: 5vw !important;
                top: 20px !important;
                max-height: calc(100dvh - 40px) !important;
                display: none !important;
                flex-direction: column !important;
                overflow: hidden !important;
            }

            .settings-panel.show {
                display: flex !important;
            }

            .modal-content {
                max-height: 85dvh !important;
                overflow-y: auto !important;
                padding: 15px !important;
            }
        }

        .dex-window.dragging .dex-window-overlay {
            display: block;
        }

        .dex-window-resize-handle {
            position: absolute;
            right: 2px;
            bottom: 2px;
            width: 15px;
            height: 15px;
            cursor: nwse-resize;
            z-index: 20;
            background: linear-gradient(135deg, transparent 50%, rgba(255, 215, 0, 0.4) 50%);
            border-bottom-right-radius: 4px;
            pointer-events: auto;
        }

        .dex-window-resize-handle::after {
            content: '';
            position: absolute;
            right: 3px;
            bottom: 3px;
            width: 8px;
            height: 8px;
            border-right: 2px solid rgba(255, 255, 255, 0.5);
            border-bottom: 2px solid rgba(255, 255, 255, 0.5);
        }

        body.resizing {
            cursor: nwse-resize !important;
            user-select: none !important;
        }

        body.resizing .dex-window-overlay {
            display: block !important;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 5%;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--glass-border);
            background: var(--glass);
            backdrop-filter: blur(5px);
            border-radius: 0 0 15px 15px;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--gold);
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .categories {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 25px;
            padding: 0 5%;
        }

        .category-tab {
            padding: 14px 0;
            border-radius: 12px;
            font-weight: bold;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: rgba(60, 60, 60, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.15);
            flex: 1;
            min-width: 120px;
            max-width: 200px;
            color: var(--app-text-color);
            opacity: 0.8;
        }

        .category-tab:hover {
            background: rgba(80, 80, 80, 0.8);
            color: var(--gold);
        }

        .category-tab.active {
            background: var(--gold-glow);
            color: var(--gold);
            border-color: var(--gold);
        }

        .apps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(110px, 1fr));
            gap: 20px;
            padding: 0 5% 120px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .app-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }

        .app-item:hover {
            transform: translateY(-5px);
        }

        .app-icon {
            width: 80px;
            height: 80px;
            background: var(--glass);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
            overflow: hidden;
            border: 1px solid var(--glass-border);
            transition: all 0.2s ease;
        }

        .app-icon img {
            max-width: 65%;
            max-height: 65%;
            transition: transform 0.2s ease;
        }

        .app-item:hover .app-icon img {
            transform: scale(1.1);
        }

        .app-icon .svg-icon {
            width: 65% !important;
            height: 65% !important;
            display: block;
        }

        .app-name {
            text-align: center;
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--app-text-color);
            transition: color 0.2s ease;
            text-shadow: 0 1px 4px rgba(0, 0, 0, 0.9);
            max-width: 90px;
            margin-top: 5px;
        }

        .app-item:hover .app-name {
            color: var(--gold);
        }

        .external-indicator {
            position: absolute;
            top: -3px;
            left: -3px;
            background: var(--gold);
            color: var(--dark);
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.5rem;
            z-index: 10;
        }

        .app-actions {
            position: absolute;
            top: -6px;
            right: -6px;
            display: flex;
            gap: 5px;
            opacity: 0;
            transition: all 0.2s ease;
        }

        .app-item:hover .app-actions {
            opacity: 1;
        }

        .edit-btn,
        .delete-btn {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            cursor: pointer;
            background: var(--dark);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.2s ease;
        }

        .edit-btn:hover {
            background: rgba(0, 100, 255, 0.5);
        }

        .delete-btn:hover {
            background: rgba(255, 50, 50, 0.5);
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .modal.show {
            display: flex;
            opacity: 1;
        }

        .modal-content {
            background: linear-gradient(145deg, #1e1e1e, #151515);
            border-radius: 15px;
            width: 90%;
            max-width: 500px;
            max-height: 85dvh;
            overflow-y: auto;
            padding: 20px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.6);
            border: 1px solid var(--glass-border);
            transform: scale(0.95);
            opacity: 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .modal.show .modal-content {
            transform: scale(1);
            opacity: 1;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--glass-border);
        }

        .modal-title {
            color: var(--gold);
            font-size: 1.3rem;
            font-weight: 600;
        }

        .close-btn {
            background: none;
            border: none;
            color: var(--light);
            font-size: 1.5rem;
            cursor: pointer;
            transition: transform 0.2s ease;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .close-btn:hover {
            color: var(--gold);
            transform: rotate(90deg);
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            color: var(--gold);
            font-weight: 500;
            font-size: 0.9rem;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid var(--glass-border);
            background: var(--glass);
            color: var(--light);
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--gold);
            background: rgba(0, 0, 0, 0.2);
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: var(--gold);
            color: var(--darker);
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .submit-btn:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
        }

        .error-message {
            color: #ff4d4d;
            text-align: center;
            margin-top: 15px;
            display: none;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .field-hint {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.5);
            margin-top: 3px;
            display: block;
        }

        .no-apps {
            grid-column: 1 / -1;
            text-align: center;
            padding: 30px 0;
        }

        .no-apps i {
            font-size: 2.2rem;
            color: var(--gold);
            opacity: 0.5;
            margin-bottom: 12px;
        }

        .no-apps h3 {
            color: rgba(255, 255, 255, 0.5);
        }

        .no-apps p {
            color: rgba(255, 255, 255, 0.3);
            margin-top: 6px;
            font-size: 0.9rem;
        }

        #dock-container {
            position: fixed;
            bottom: 20px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            z-index: 999;
            transition: transform 0.3s ease;
        }

        #dock {
            display: flex;
            background: rgba(30, 30, 30, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 10px 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
            border: 1px solid var(--gold-glow);
        }

        .dock-item {
            width: 60px;
            height: 60px;
            margin: 0 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .dock-item:hover {
            transform: translateY(-8px) scale(1.1);
            background: var(--gold-glow);
            border-color: var(--gold);
            box-shadow: 0 5px 15px var(--gold-glow);
        }

        .dock-item img {
            max-width: 70%;
            max-height: 70%;
        }

        .dock-item i {
            font-size: 1.4rem;
            color: var(--gold);
        }

        .settings-panel {
            position: fixed;
            top: 70px;
            right: 20px;
            background: rgba(20, 20, 20, 0.98);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
            border: 1px solid var(--glass-border);
            z-index: 100000;
            display: none;
            flex-direction: column;
            width: 280px;
            max-height: calc(100vh - 120px);
            transform-origin: top right;
            transform: scale(0.95);
            opacity: 0;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            pointer-events: none;
        }

        .settings-panel.show {
            display: flex;
            transform: scale(1);
            opacity: 1;
            pointer-events: auto;
        }

        .settings-header {
            padding: 15px 20px;
            border-bottom: 1px solid var(--glass-border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.03);
        }

        .settings-header span {
            font-weight: bold;
            color: var(--gold);
            font-size: 1rem;
            letter-spacing: 0.5px;
        }

        .settings-content {
            padding: 10px 15px 20px;
            overflow-y: auto;
            flex: 1;
        }

        .settings-content::-webkit-scrollbar {
            width: 3px;
        }

        .settings-section {
            margin-top: 15px;
            padding-top: 10px;
        }

        .settings-section:not(:first-child) {
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .section-title {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: var(--app-text-color);
            opacity: 0.5;
            font-weight: bold;
            margin-bottom: 10px;
            padding-left: 5px;
            letter-spacing: 1px;
        }

        .settings-item-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 5px;
            gap: 10px;
        }

        .item-label {
            font-size: 0.9rem;
            color: var(--app-text-color);
            opacity: 0.9;
        }

        .item-controls {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .mini-btn {
            border: none;
            border-radius: 12px;
            padding: 4px 10px;
            font-size: 0.7rem;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.1);
            color: var(--app-text-color);
            transition: 0.2s;
        }

        .mini-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .color-swatch {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid rgba(255, 255, 255, 0.2);
            flex-shrink: 0;
        }

        .admin-error-box {
            background: rgba(255, 0, 0, 0.15);
            color: #ff9999;
            padding: 12px;
            border-radius: 10px;
            margin-top: 15px;
            border: 1px solid rgba(255, 0, 0, 0.3);
            text-align: center;
            font-size: 0.85rem;
        }

        .settings-footer {
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            text-align: center;
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.7rem;
            line-height: 1.5;
        }

        .settings-close {
            background: none;
            border: none;
            color: var(--app-text-color);
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0 5px;
            line-height: 1;
            opacity: 0.8;
            transition: 0.2s;
        }

        .settings-close:hover {
            color: var(--gold);
            opacity: 1;
        }

        .settings-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 15px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            color: var(--app-text-color);
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            width: 100%;
            text-align: left;
            margin-bottom: 8px;
        }

        .settings-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--gold);
            transform: translateX(3px);
        }

        .settings-btn.dex-premium-btn {
            background: none;
            color: #000;
            margin: 10px 0;
            padding: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: visible;
            font-weight: bold;
            z-index: 1;
            border: none;
        }

        .settings-btn.dex-premium-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, var(--gold), #ffaa00);
            border: 1.5px solid rgba(255, 255, 255, 0.4);
            border-radius: 12px;
            z-index: -1;
            animation: dexPulse 2.5s infinite ease-in-out;
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.3);
            pointer-events: none;
        }

        @keyframes dexPulse {
            0% {
                box-shadow: 0 0 10px rgba(255, 215, 0, 0.2);
                transform: scale(1);
            }

            50% {
                box-shadow: 0 0 20px rgba(255, 215, 0, 0.4);
                transform: scale(1.02);
            }

            100% {
                box-shadow: 0 0 10px rgba(255, 215, 0, 0.2);
                transform: scale(1);
            }
        }

        body.dex-mode .settings-btn.dex-premium-btn::before {
            background: linear-gradient(135deg, var(--gold), #ffaa00);
        }

        .settings-btn.dex-premium-btn:hover::before {
            animation-play-state: paused;
            transform: scale(1.04);
            filter: brightness(1.1);
        }

        .settings-btn.dex-premium-btn:hover {
            color: #000;
        }

        .settings-btn .svg-icon {
            width: 18px;
            height: 18px;
            opacity: 0.8;
            color: var(--gold);
        }

        .settings-btn i {
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        .settings-btn.logout {
            color: #ff6b6b;
        }

        .settings-btn.logout:hover {
            background: rgba(255, 107, 107, 0.1);
            border-color: rgba(255, 107, 107, 0.3);
        }

        .gear-btn {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            color: var(--gold);
            width: 42px;
            height: 42px;
            padding: 0;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            transform-origin: center center;
        }

        .gear-btn .svg-icon {
            width: 22px;
            height: 22px;
            margin: 0;
            display: block;
        }

        .gear-btn:hover {
            background: rgba(255, 215, 0, 0.1);
            transform: rotate(90deg);
        }

        .settings-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 99999;
            display: none;
            background: rgba(0, 0, 0, 0.1);
            pointer-events: none;
        }

        .settings-overlay.show {
            display: block;
            pointer-events: auto;
        }

        .widget {
            position: fixed;
            background: rgba(30, 30, 30, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
            border: 1px solid var(--glass-border);
            z-index: 100;
            /* Behind windows (starting at 500/1000) */
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            cursor: move;
            display: none;
            pointer-events: auto;
            /* Ensure it catches clicks */
            user-select: none;
        }

        #widgets-container {
            position: fixed;
            inset: 0;
            pointer-events: none;
            /* Container is transparent to clicks */
            z-index: 100;
        }

        .widget.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .widget-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--glass-border);
            color: var(--gold);
            font-weight: 500;
            cursor: move;
        }

        .widget-header i {
            margin-right: 8px;
        }

        .widget-header span {
            flex: 1;
        }

        .widget-close {
            background: none;
            border: none;
            color: var(--light);
            cursor: pointer;
            font-size: 0.9rem;
            transition: color 0.2s;
        }

        .widget-close:hover {
            color: var(--gold);
        }

        .widget-body {
            color: var(--light);
        }

        #time-widget .widget-body {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            letter-spacing: 2px;
        }

        #calendar-widget .widget-body,
        #ping-widget .widget-body {
            font-size: 1.1rem;
            font-weight: bold;
            text-align: center;
            padding: 10px;
        }

        #music-widget {
            width: 280px;
        }

        .music-controls {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 18px;
            margin: 15px 0;
            padding: 5px;
        }

        .music-btn {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--gold);
            border-radius: 50%;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            backdrop-filter: blur(5px);
            position: relative;
        }

        .music-btn:hover {
            background: rgba(255, 215, 0, 0.2);
            border-color: var(--gold);
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            color: #fff;
        }

        .music-btn:active {
            transform: translateY(0) scale(0.95);
        }

        .music-btn.play-btn {
            width: 65px;
            height: 65px;
            background: rgba(255, 215, 0, 0.15);
            border: 2px solid var(--gold);
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.15);
        }

        .music-btn.play-btn:hover {
            box-shadow: 0 0 30px rgba(255, 215, 0, 0.3);
        }

        .music-btn .svg-icon {
            width: 1.35rem;
            height: 1.35rem;
            transition: transform 0.2s;
        }

        .music-btn.play-btn .svg-icon {
            width: 1.9rem;
            height: 1.9rem;
        }

        /* Balanceamento Visual Óptico */
        .music-btn .svg-icon.icon-play {
            margin-left: 4px;
        }

        .music-btn .svg-icon.icon-backward {
            margin-right: 2px;
        }

        .music-btn .svg-icon.icon-forward {
            margin-left: 2px;
            transform: scaleX(-1);
        }

        .music-info {
            text-align: center;
            font-size: 0.85rem;
            margin-bottom: 10px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: var(--light);
        }

        .music-playlist-toggle {
            width: 100%;
            padding: 6px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            color: var(--gold);
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s;
            font-size: 0.8rem;
            margin-top: 10px;
        }

        .music-playlist-toggle:hover {
            background: rgba(255, 215, 0, 0.1);
        }

        .music-playlist {
            max-height: 150px;
            overflow-y: auto;
            margin-top: 10px;
            padding-right: 5px;
            display: none;
        }

        .music-playlist.show {
            display: block;
        }

        .playlist-item {
            padding: 8px;
            font-size: 0.8rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            cursor: pointer;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: 0.2s;
            border-radius: 4px;
        }

        .playlist-item:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .playlist-item.playing {
            color: var(--gold);
            background: rgba(255, 215, 0, 0.05);
            font-weight: bold;
        }

        #music-folder-input {
            display: none;
        }

        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 20px;
            margin-left: auto;
            flex-shrink: 0;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.1);
            transition: .4s;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 2px;
            bottom: 1px;
            background-color: rgba(255, 255, 255, 0.5);
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.toggle-slider {
            background-color: var(--gold);
        }

        input:checked+.toggle-slider:before {
            transform: translateX(20px);
            background-color: var(--darker);
        }

        .wallpapers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
            gap: 10px;
            margin-bottom: 15px;
            max-height: 200px;
            overflow-y: auto;
            padding: 5px;
        }

        .wallpaper-thumb {
            width: 80px;
            height: 60px;
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.2s ease;
        }

        .wallpaper-thumb:hover {
            transform: scale(1.05);
            border-color: var(--gold);
        }

        .wallpaper-thumb.selected {
            border-color: var(--gold);
            box-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
        }

        .wallpaper-preview {
            width: 100%;
            height: 200px;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            margin-bottom: 20px;
            border: 1px solid var(--glass-border);
        }

        /* Wallpaper tabs */
        .wp-tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 15px;
        }

        .wp-tab {
            flex: 1;
            padding: 9px 0;
            border-radius: 8px;
            border: 1px solid var(--glass-border);
            background: var(--glass);
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .wp-tab:hover {
            background: rgba(255, 215, 0, 0.08);
            color: var(--gold);
        }

        .wp-tab.active {
            background: rgba(255, 215, 0, 0.12);
            color: var(--gold);
            border-color: var(--gold);
        }

        .wp-panel {
            display: none;
        }

        .wp-panel.active {
            display: block;
        }

        /* Animated wallpaper cards */
        .anim-wp-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 10px;
            max-height: 220px;
            overflow-y: auto;
            padding: 4px;
        }

        .anim-wp-card {
            border-radius: 10px;
            border: 2px solid transparent;
            background: rgba(255, 255, 255, 0.05);
            cursor: pointer;
            transition: all 0.2s;
            overflow: hidden;
        }

        .anim-wp-card:hover {
            border-color: var(--gold);
            transform: scale(1.03);
        }

        .anim-wp-card.selected {
            border-color: var(--gold);
            box-shadow: 0 0 12px var(--gold-glow);
        }

        .anim-wp-card .anim-preview {
            width: 100%;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            background: linear-gradient(135deg, #1a1a2e, #16213e);
        }

        .anim-wp-card .anim-name {
            font-size: 0.72rem;
            text-align: center;
            padding: 5px 4px;
            color: rgba(255, 255, 255, 0.8);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .no-anim-wp {
            text-align: center;
            padding: 20px;
            color: rgba(255, 255, 255, 0.35);
            font-size: 0.85rem;
        }

        .no-anim-wp i {
            display: block;
            font-size: 1.8rem;
            margin-bottom: 8px;
            color: var(--gold);
            opacity: 0.4;
        }

        /* Full-screen wallpaper layer (Static & Animated) */
        #wallpaper-layer {
            position: fixed;
            inset: 0;
            z-index: 1;
            pointer-events: none;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: none;
        }

        #wallpaper-layer canvas,
        #wallpaper-layer svg {
            width: 100%;
            height: 100%;
            display: block;
        }

        @media (max-width: 768px) {
            .apps-grid {
                grid-template-columns: repeat(auto-fill, minmax(90px, 1fr));
                gap: 15px;
            }

            .apps-grid {
                grid-template-columns: repeat(auto-fill, minmax(90px, 1fr));
                gap: 15px;
            }

            .app-icon {
                width: 70px;
                height: 70px;
            }

            .gear-btn {
                width: 36px;
                height: 36px;
            }

            .logo {
                font-size: 1.5rem;
            }
        }

        /* Landscape Refined - Final Block for Highest Precedence */
        @media screen and (orientation: landscape) {
            #dex-start-menu {
                height: auto !important;
                max-height: 75dvh !important;
                bottom: calc(52px + env(safe-area-inset-bottom)) !important;
                top: auto !important;
                padding: 5px !important;
                z-index: 10001 !important;
                /* Higher than windows and base modals */
            }

            .dex-start-app img {
                width: 26px !important;
                height: 26px !important;
            }

            .dex-start-apps {
                grid-template-columns: repeat(4, 1fr) !important;
                gap: 5px !important;
            }

            /* Only affect SHOwN modals to prevent invisible layers blocking interaction */
            .modal.show {
                align-items: flex-start !important;
                padding-top: 10px !important;
                overflow-y: auto !important;
                display: flex !important;
            }

            .modal-content {
                max-height: 90dvh !important;
                margin: 0 auto 50px auto !important;
                display: flex !important;
                flex-direction: column !important;
                transform: none !important;
            }

            .wp-panel {
                overflow-y: auto !important;
                max-height: 180px !important;
            }

            .wallpapers-grid,
            .anim-wp-grid {
                max-height: 140px !important;
                grid-template-columns: repeat(auto-fill, minmax(80px, 1fr)) !important;
            }

            .settings-panel {
                max-height: 88dvh !important;
                top: 5px !important;
                display: none !important;
                flex-direction: column !important;
                overflow: hidden !important;
            }

            .settings-panel.show {
                display: flex !important;
            }
        }

        /* Universal Mobile Categories Scroll (Classic Mode) - Forced Single Line */
        @media screen and (max-width: 1024px) {
            .categories {
                justify-content: flex-start !important;
                overflow-x: auto !important;
                padding: 10px 15px !important;
                scrollbar-width: none !important;
                -ms-overflow-style: none !important;
                flex-wrap: nowrap !important;
                -webkit-overflow-scrolling: touch;
                gap: 12px !important;
            }

            .categories::-webkit-scrollbar {
                display: none !important;
            }

            .category-tab {
                flex: 0 0 auto !important;
                width: auto !important;
                min-width: 130px !important;
                padding: 12px 20px !important;
                max-width: none !important;
            }
        }

        /* Classic Mode Search Bar */
        .classic-search {
            display: flex;
            align-items: center;
            gap: 15px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 12px 25px;
            margin: 0 5% 25px;
            border-radius: 50px;
            color: var(--gold);
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        @media screen and (orientation: landscape) {
            .classic-search {
                max-width: 600px;
                margin: 0 auto 25px;
            }
        }

        .classic-search:focus-within {
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--gold);
            box-shadow: 0 0 15px var(--gold-glow);
        }

        .classic-search input {
            background: none;
            border: none;
            color: var(--app-text-color);
            font-size: 1.05rem;
            width: 100%;
            outline: none;
            font-family: inherit;
        }

        .classic-search input::placeholder {
            color: rgba(255, 255, 255, 0.35);
        }

        .classic-search svg {
            width: 18px;
            height: 18px;
            opacity: 0.7;
        }


        /* ---- Custom Web Apps Styling ---- */
        .app-item,
        .dex-start-app {
            position: relative;
        }

        .delete-app-btn {
            display: none;
            /* Removed hover delete button for better mobile support */
        }


        /* Custom App Modal */
        #add-web-modal .modal-content {
            width: 95%;
            max-width: 480px;
            background: rgba(15, 15, 15, 0.98);
            backdrop-filter: blur(25px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 25px;
            box-shadow: 0 20px 80px rgba(0, 0, 0, 0.9);
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-tabs {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 10px;
        }

        .modal-tab-btn {
            background: none;
            border: none;
            color: white;
            opacity: 0.5;
            cursor: pointer;
            font-weight: bold;
            font-size: 1rem;
            padding: 5px 0;
            position: relative;
            transition: 0.2s;
        }

        .modal-tab-btn.active {
            opacity: 1;
            color: var(--gold);
        }

        .modal-tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: -11px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--gold);
            border-radius: 3px 3px 0 0;
        }

        .manage-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .manage-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .manage-item-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .manage-item-info img {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            object-fit: contain;
        }

        .manage-item-name {
            font-size: 0.95rem;
            font-weight: 500;
            color: white;
        }

        .manage-delete-btn {
            background: rgba(255, 77, 77, 0.1);
            color: #ff4d4d;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.2s;
        }

        .manage-delete-btn:hover {
            background: #ff4d4d;
            color: white;
            transform: scale(1.05);
        }

        .modal-form-group {
            margin-bottom: 22px;
            position: relative;
        }

        .modal-form-group label {
            display: block;
            margin-bottom: 10px;
            color: var(--gold);
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.9;
        }

        .modal-form-group input,
        .modal-form-group select,
        .modal-form-group textarea {
            width: 100%;
            padding: 14px 16px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: #fff;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .modal-form-group input:focus,
        .modal-form-group select:focus,
        .modal-form-group textarea:focus {
            outline: none;
            border-color: var(--gold);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.15);
            transform: translateY(-2px);
        }

        .modal-form-group input::placeholder,
        .modal-form-group textarea::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }

        /* ---- Confirmation Modal ---- */
        #confirm-modal {
            z-index: 99999999;
        }

        #confirm-modal .modal-content {
            max-width: 400px;
            text-align: center;
            padding: 30px;
        }

        .confirm-buttons {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, var(--gold), #ffcc00);
            color: #000;
            border: none;
            padding: 14px;
            border-radius: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 215, 0, 0.4);
            filter: brightness(1.1);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .confirm-btn-yes {
            flex: 1;
            background: linear-gradient(135deg, var(--gold), #ffcc00);
            color: black;
            border: none;
            padding: 12px;
            border-radius: 12px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
            box-shadow: 0 4px 10px rgba(255, 215, 0, 0.2);
        }

        .confirm-btn-no {
            flex: 1;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: 0.2s;
        }

        .confirm-btn-yes:hover {
            transform: scale(1.02);
            filter: brightness(1.1);
        }

        .confirm-btn-no:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* ---- Toast Notifications ---- */
        #toast-container {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999999;
            display: flex;
            flex-direction: column;
            gap: 10px;
            pointer-events: none;
        }

        .toast {
            min-width: 250px;
            max-width: 450px;
            background: rgba(20, 20, 20, 0.85);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 12px 20px;
            color: white;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            pointer-events: auto;
            animation: toastIn 0.4s cubic-bezier(0.18, 0.89, 0.32, 1.28);
            transition: all 0.3s ease;
        }

        .toast.hiding {
            opacity: 0;
            transform: translateY(-20px) scale(0.9);
        }

        @keyframes toastIn {
            from {
                opacity: 0;
                transform: translateY(-20px) scale(0.9);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .toast-icon {
            width: 22px;
            height: 22px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .toast-msg {
            font-size: 0.9rem;
            line-height: 1.4;
            font-weight: 500;
        }

        .toast-success .toast-icon {
            color: #4CAF50;
        }

        .toast-error .toast-icon {
            color: #FF5252;
        }

        .toast-info .toast-icon {
            color: var(--gold);
        }

        .modal-form-group input:focus {
            outline: none;
            border-color: var(--gold);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 3px var(--gold-glow);
        }

        .modal-actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .modal-btn {
            flex: 1;
            padding: 12px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            font-size: 0.95rem;
            transition: 0.2s;
        }

        .modal-btn-cancel {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .modal-btn-save {
            background: var(--gold);
            color: #000;
        }

        .modal-btn:hover {
            transform: translateY(-2px);
            filter: brightness(1.1);
        }

        #icon-preview-container {
            width: 64px;
            height: 64px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.05);
            margin: 10px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        #icon-preview-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
    </style>
</head>

<body id="main-body">
    <div id="startup-animation" style="display: none;">
        <div class="logo-animation">
            <div class="logo-text">GoldenOS</div>
            <div class="loader">
                <div class="loader-circle"></div>
                <div class="loader-circle"></div>
            </div>
        </div>
    </div>

    <div id="main-content">
        <header>
            <div class="logo">GoldenOS</div>
            <div>
                <button class="gear-btn" onclick="toggleSettingsPanel()" tabindex="0">
                    <?= render_svg_icon('cog')?>
                </button>
            </div>
        </header>

        <div class="categories">
            <button class="category-tab apps <?= $active_category === 'apps' ? 'active' : ''?>"
                onclick="changeCategory('apps')" tabindex="0">
                <?= render_svg_icon('th')?> Apps
            </button>
            <button class="category-tab games <?= $active_category === 'games' ? 'active' : ''?>"
                onclick="changeCategory('games')" tabindex="0">
                <?= render_svg_icon('gamepad')?> Games
            </button>
            <button class="category-tab webs <?= $active_category === 'webs' ? 'active' : ''?>"
                onclick="changeCategory('webs')" tabindex="0">
                <?= render_svg_icon('globe')?> Webs
            </button>
            <button class="category-tab downloads <?= $active_category === 'downloads' ? 'active' : ''?>"
                onclick="changeCategory('downloads')" tabindex="0">
                <?= render_svg_icon('download')?> Downloads
            </button>
        </div>

        <div class="classic-search">
            <?= render_svg_icon('search')?>
            <input type="text" id="classic-search-input" placeholder="Pesquisar aplicativos..."
                onkeyup="filterClassicApps()" tabindex="0">
        </div>

        <div id="classic-apps-container">
            <?php foreach (['apps', 'games', 'webs', 'downloads'] as $cat): ?>
            <div class="apps-grid category-grid" id="grid-<?= $cat?>"
                style="<?= $cat === $active_category ? '' : 'display: none;'?>">
                <?php
    $category_items = $apps[$cat] ?? [];
    if (!empty($category_items)):
        foreach ($category_items as $id => $app):
            $isUrl = str_starts_with($app['file'], 'http');
?>
                <div class="app-item" data-id="<?= $id?>" data-name="<?= htmlspecialchars($app['name'])?>" tabindex="0"
                    data-file="<?= htmlspecialchars($app['file'])?>" data-icon="<?= htmlspecialchars($app['icon'])?>">
                    <?php if ($isUrl): ?>
                    <div class="external-indicator" title="Link externo">
                        <?= render_svg_icon('external-link-alt')?>
                    </div>
                    <?php
            endif; ?>
                    <div class="app-icon" onclick="openApp('<?= htmlspecialchars($app['file'])?>')">
                        <?php if (!empty($app['icon']) && file_exists('icons/' . $app['icon'])): ?>
                        <img src="icons/<?= htmlspecialchars($app['icon'])?>"
                            alt="<?= htmlspecialchars($app['name'])?>">
                        <?php
            elseif ($isUrl): ?>
                        <?= render_svg_icon('link', 'fa-icon-large')?>
                        <?php
            else: ?>
                        <?= render_svg_icon('android', 'fa-icon-large')?>
                        <?php
            endif; ?>
                    </div>
                    <div class="app-name">
                        <?= htmlspecialchars($app['name'])?>
                    </div>
                </div>
                <?php
        endforeach; ?>
                <?php
    else: ?>
                <div class="no-apps">
                    <?= render_svg_icon('inbox')?>
                    <h3>Nenhum item encontrado</h3>
                    <p>
                        <?php
        switch ($cat) {
            case 'apps':
                echo 'Adicione seus aplicativos favoritos';
                break;
            case 'downloads':
                echo 'Adicione seus downloads';
                break;
            case 'webs':
                echo 'Adicione seus sites favoritos';
                break;
            case 'games':
                echo 'Adicione seus jogos favoritos';
                break;
            default:
                echo 'Adicione novos itens';
                break;
        }
?>
                    </p>
                </div>
                <?php
    endif; ?>
            </div>
            <?php
endforeach; ?>
        </div>
    </div>

    <div id="dock-container">
        <div id="dock"></div>
    </div>

    <!-- ADD CUSTOM WEB MODAL -->
    <div id="add-web-modal" class="modal">
        <div class="modal-content">
            <div class="modal-tabs">
                <button class="modal-tab-btn active" id="tab-add-btn"
                    onclick="switchWebModalTab('add')">Adicionar</button>
                <button class="modal-tab-btn" id="tab-manage-btn"
                    onclick="switchWebModalTab('manage')">Gerenciar</button>
                <button class="modal-btn-cancel" onclick="closeAddWebModal()"
                    style="margin-left: auto; background: none; border: none; color: white; cursor: pointer; font-size: 1.2rem; opacity: 0.5;">&times;</button>
            </div>

            <!-- Add Tab -->
            <div id="web-modal-add-section">
                <h3
                    style="color: var(--gold); margin-bottom: 20px; display: flex; align-items: center; gap: 10px; font-size: 1.1rem;">
                    <?= render_svg_icon('plus-circle')?> Novo Site
                </h3>
                <div class="modal-form-group">
                    <label>Nome do Site</label>
                    <input type="text" id="web-name-input" placeholder="Ex: Google, YouTube...">
                </div>
                <div class="modal-form-group">
                    <label>Link (URL)</label>
                    <input type="text" id="web-url-input" placeholder="https://www.exemplo.com">
                </div>
                <div class="modal-form-group">
                    <label>Ícone (PNG)</label>
                    <input type="file" id="web-icon-input" accept="image/png" onchange="previewWebIcon(this)">
                    <div id="icon-preview-container" class="icon-preview-container"
                        style="margin-top: 10px; width: 50px; height: 50px; border: 1px dashed var(--glass-border); border-radius: 8px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                        <span style="opacity: 0.3; font-size: 0.8rem;">Preview</span>
                    </div>
                </div>
                <div class="modal-actions">
                    <button class="modal-btn modal-btn-save" onclick="saveCustomWeb()" style="width: 100%;">Salvar
                        Site</button>
                </div>
            </div>

            <!-- Manage Tab -->
            <div id="web-modal-manage-section" style="display: none;">
                <h3
                    style="color: var(--gold); margin-bottom: 20px; display: flex; align-items: center; gap: 10px; font-size: 1.1rem;">
                    <?= render_svg_icon('edit')?> Seus Sites
                </h3>
                <div id="manage-web-list" class="manage-list">
                    <!-- Custom sites will be listed here -->
                </div>
            </div>
        </div>
    </div>

    <div id="add-download-modal" class="modal">
        <div class="modal-content">
            <div class="modal-tabs">
                <button class="modal-tab-btn active" id="download-tab-add-btn"
                    onclick="switchDownloadModalTab('add')">Adicionar</button>
                <button class="modal-tab-btn" id="download-tab-manage-btn"
                    onclick="switchDownloadModalTab('manage')">Gerenciar</button>
                <button class="modal-btn-cancel" onclick="closeAddDownloadModal()"
                    style="margin-left: auto; background: none; border: none; color: white; cursor: pointer; font-size: 1.2rem; opacity: 0.5;">&times;</button>
            </div>

            <!-- Add Tab -->
            <div id="download-modal-add-section">
                <h3
                    style="color: var(--gold); margin-bottom: 20px; display: flex; align-items: center; gap: 10px; font-size: 1.1rem;">
                    <?= render_svg_icon('download')?> Novo Download
                </h3>
                <div class="modal-form-group">
                    <label>Nome do Arquivo/Site</label>
                    <input type="text" id="download-name-input" placeholder="Ex: Download 1, Site de Download...">
                </div>
                <div class="modal-form-group">
                    <label>Link (URL)</label>
                    <input type="text" id="download-url-input" placeholder="https://www.exemplo.com/arquivo.zip">
                </div>
                <div class="modal-form-group">
                    <label>Ícone (PNG)</label>
                    <input type="file" id="download-icon-input" accept="image/png" onchange="previewDownloadIcon(this)">
                    <div id="download-icon-preview-container" class="icon-preview-container"
                        style="margin-top: 10px; width: 50px; height: 50px; border: 1px dashed var(--glass-border); border-radius: 8px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                        <span style="opacity: 0.3; font-size: 0.8rem;">Preview</span>
                    </div>
                </div>
                <div class="modal-actions">
                    <button class="modal-btn modal-btn-save" onclick="saveCustomDownload()" style="width: 100%;">Salvar
                        Download</button>
                </div>
            </div>

            <!-- Manage Tab -->
            <div id="download-modal-manage-section" style="display: none;">
                <h3
                    style="color: var(--gold); margin-bottom: 20px; display: flex; align-items: center; gap: 10px; font-size: 1.1rem;">
                    <?= render_svg_icon('edit')?> Seus Downloads
                </h3>
                <div id="manage-download-list" class="manage-list">
                    <!-- Custom downloads will be listed here -->
                </div>
            </div>
        </div>
    </div>

    <!-- ADD LOCAL APP MODAL -->
    <div id="add-app-modal" class="modal">
        <div class="modal-content" style="max-width: 600px;">
            <div class="modal-tabs">
                <button class="modal-tab-btn active" id="app-tab-add-btn" onclick="switchAppModalTab('add')">Adicionar
                    App</button>
                <button class="modal-tab-btn" id="app-tab-manage-btn"
                    onclick="switchAppModalTab('manage')">Gerenciar</button>
                <button class="modal-btn-cancel" onclick="closeAddAppModal()"
                    style="margin-left: auto; background: none; border: none; color: white; cursor: pointer; font-size: 1.2rem; opacity: 0.5;">&times;</button>
            </div>

            <!-- Add Tab -->
            <div id="app-modal-add-section">
                <h3
                    style="color: var(--gold); margin-bottom: 20px; display: flex; align-items: center; gap: 10px; font-size: 1.1rem;">
                    <?= render_svg_icon('plus-circle')?> Novo App Local (HTML/JS)
                </h3>
                <div class="modal-form-group">
                    <label>Nome do App</label>
                    <input type="text" id="app-name-input" placeholder="Ex: Meu App, Calculadora...">
                </div>
                <div class="modal-form-group">
                    <label>Código (HTML/JavaScript)</label>
                    <textarea id="app-code-input"
                        placeholder="&lt;p&gt;Olá Mundo!&lt;/p&gt;&lt;script&gt;showToast('Oi');&lt;/script&gt;"
                        style="width: 100%; height: 200px; background: #1a1a1a; border: 1px solid var(--glass-border); border-radius: 8px; color: white; padding: 10px; font-family: monospace; resize: vertical;"></textarea>
                </div>
                <div class="modal-form-group">
                    <label>Ícone (PNG)</label>
                    <input type="file" id="app-icon-input" accept="image/png" onchange="previewAppIcon(this)">
                    <div id="app-icon-preview-container" class="icon-preview-container"
                        style="margin-top: 10px; width: 50px; height: 50px; border: 1px dashed var(--glass-border); border-radius: 8px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                        <span style="opacity: 0.3; font-size: 0.8rem;">Preview</span>
                    </div>
                </div>
                <div class="modal-actions">
                    <button class="modal-btn modal-btn-save" onclick="saveCustomApp()" style="width: 100%;">Salvar
                        App</button>
                </div>
            </div>

            <!-- Manage Tab -->
            <div id="app-modal-manage-section" style="display: none;">
                <h3
                    style="color: var(--gold); margin-bottom: 20px; display: flex; align-items: center; gap: 10px; font-size: 1.1rem;">
                    <?= render_svg_icon('cog')?> Gerenciar Apps
                </h3>
                <div id="manage-app-list" class="manage-list">
                    <!-- Custom apps will be listed here -->
                </div>
            </div>
        </div>
    </div>

    <!-- ADD LOCAL GAME MODAL -->
    <div id="add-game-modal" class="modal">
        <div class="modal-content" style="max-width: 600px;">
            <div class="modal-tabs">
                <button class="modal-tab-btn active" id="game-tab-add-btn" onclick="switchGameModalTab('add')">Adicionar
                    Jogo</button>
                <button class="modal-tab-btn" id="game-tab-manage-btn"
                    onclick="switchGameModalTab('manage')">Gerenciar</button>
                <button class="modal-btn-cancel" onclick="closeAddGameModal()"
                    style="margin-left: auto; background: none; border: none; color: white; cursor: pointer; font-size: 1.2rem; opacity: 0.5;">&times;</button>
            </div>

            <!-- Add Tab -->
            <div id="game-modal-add-section">
                <h3
                    style="color: var(--gold); margin-bottom: 20px; display: flex; align-items: center; gap: 10px; font-size: 1.1rem;">
                    <?= render_svg_icon('plus-circle')?> Novo Jogo Local (HTML/JS)
                </h3>
                <div class="modal-form-group">
                    <label>Nome do Jogo</label>
                    <input type="text" id="game-name-input" placeholder="Ex: Tetris, Snake...">
                </div>
                <div class="modal-form-group">
                    <label>Código (HTML/JavaScript)</label>
                    <textarea id="game-code-input" placeholder="&lt;p&gt;Carregando Jogo...&lt;/p&gt;"
                        style="width: 100%; height: 200px; background: #1a1a1a; border: 1px solid var(--glass-border); border-radius: 8px; color: white; padding: 10px; font-family: monospace; resize: vertical;"></textarea>
                </div>
                <div class="modal-form-group">
                    <label>Ícone (PNG/JPG)</label>
                    <input type="file" id="game-icon-input" accept="image/*" onchange="previewGameIcon(this)">
                    <div id="game-icon-preview-container" class="icon-preview-container"
                        style="margin-top: 10px; width: 50px; height: 50px; border: 1px dashed var(--glass-border); border-radius: 8px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                        <span style="opacity: 0.3; font-size: 0.8rem;">Preview</span>
                    </div>
                </div>
                <div class="modal-actions">
                    <button class="modal-btn modal-btn-save" onclick="saveCustomGame()" style="width: 100%;">Salvar
                        Jogo</button>
                </div>
            </div>

            <!-- Manage Tab -->
            <div id="game-modal-manage-section" style="display: none;">
                <h3
                    style="color: var(--gold); margin-bottom: 20px; display: flex; align-items: center; gap: 10px; font-size: 1.1rem;">
                    <?= render_svg_icon('gamepad')?> Gerenciar Jogos
                </h3>
                <div id="manage-game-list" class="manage-list">
                    <!-- Custom games will be listed here -->
                </div>
            </div>
        </div>
    </div>

    <!-- BACKUP MODAL -->
    <div id="backup-modal" class="modal">
        <div class="modal-content" style="max-width: 500px;">
            <div class="modal-header">
                <h3 style="color: var(--gold); display: flex; align-items: center; gap: 10px;">
                    <?= render_svg_icon('download')?> Exportar / Importar Dados
                </h3>
                <button class="close-btn" onclick="closeModal('backup-modal')">&times;</button>
            </div>
            <div class="modal-body" style="padding: 20px 0;">
                <p style="margin-bottom: 20px; opacity: 0.8; line-height: 1.5;">
                    Crie um backup de todos os seus aplicativos locais, sites, jogos e configurações do GoldenOS.
                </p>

                <div style="display: flex; flex-direction: column; gap: 15px;">
                    <button class="modal-btn modal-btn-save" onclick="exportData()"
                        style="width: 100%; display: flex; align-items: center; justify-content: center; gap: 10px; padding: 15px; border-radius: 12px; font-size: 1rem;">
                        <?= render_svg_icon('download')?> Exportar Backup (.json)
                    </button>

                    <div style="display: flex; align-items: center; gap: 10px; margin: 5px 0;">
                        <div style="flex: 1; height: 1px; background: var(--glass-border);"></div>
                        <span
                            style="font-size: 0.7rem; opacity: 0.5; text-transform: uppercase; letter-spacing: 1px;">OU</span>
                        <div style="flex: 1; height: 1px; background: var(--glass-border);"></div>
                    </div>

                    <button class="modal-btn" onclick="document.getElementById('import-input').click()"
                        style="width: 100%; display: flex; align-items: center; justify-content: center; gap: 10px; padding: 15px; border-radius: 12px; font-size: 1rem; background: rgba(255, 255, 255, 0.15); border: 1px solid rgba(255, 255, 255, 0.2); color: #fff; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
                        <?= render_svg_icon('upload')?> Importar Backup
                    </button>
                    <input type="file" id="import-input" accept=".json" style="display: none;"
                        onchange="importData(this)">
                </div>

                <p
                    style="margin-top: 20px; font-size: 0.8rem; color: #ffab00; display: flex; align-items: center; gap: 5px;">
                    <?= render_svg_icon('exclamation-triangle')?>
                    A importação irá substituir todos os dados atuais e recarregar a página.
                </p>
            </div>
        </div>
    </div>

    <!-- GOLDENDEX MODE CONTAINERS -->
    <div id="dex-desktop"></div>
    <div id="dex-windows-container"></div>
    <div id="dex-start-menu">
        <div class="dex-search">
            <?= render_svg_icon('search')?>
            <input type="text" id="dex-search-input" placeholder="Buscar aplicativos..." onkeyup="filterDexApps()">
        </div>
        <div class="dex-start-categories" id="dex-categories">
            <button class="dex-start-cat-btn active" data-cat="tudo"
                onclick="changeDexCategory('tudo', this)">Todos</button>
            <button class="dex-start-cat-btn" data-cat="apps" onclick="changeDexCategory('apps', this)">Apps</button>
            <button class="dex-start-cat-btn" data-cat="games" onclick="changeDexCategory('games', this)">Games</button>
            <button class="dex-start-cat-btn" data-cat="webs" onclick="changeDexCategory('webs', this)">Webs</button>
            <button class="dex-start-cat-btn" data-cat="downloads"
                onclick="changeDexCategory('downloads', this)">Downloads</button>
        </div>
        <div class="dex-start-apps" id="dex-start-apps">
            <!-- App icons will spawn here -->
        </div>
        <div
            style="border-top: 1px solid rgba(255,255,255,0.1); margin-top: 10px; padding-top: 10px; text-align: center; color: rgba(255,255,255,0.5); font-size: 0.75rem;">
            Arraste os apps para a área de trabalho
        </div>
    </div>
    <div id="dex-taskbar">
        <button class="dex-start-btn" onclick="toggleDexStartMenu(event)" tabindex="0">
            <?= render_svg_icon('th-large')?>
        </button>
        <div class="dex-taskbar-favorites" id="dex-taskbar-favorites">
            <!-- Favorite apps icons will spawn here -->
        </div>
        <div class="dex-taskbar-apps" id="dex-taskbar-apps">
            <!-- Running apps will spawn here -->
        </div>
        <div class="dex-system-tray">
            <div id="dex-tray-music" onclick="toggleWidgetState('music')" tabindex="0">
                <?= render_svg_icon('music')?>
            </div>
            <div id="dex-tray-ping" onclick="toggleWidgetState('ping')" tabindex="0">
                <?= render_svg_icon('server')?>
            </div>
            <div id="dex-tray-calendar" onclick="toggleWidgetState('calendar')" tabindex="0">
                <?= render_svg_icon('calendar-alt')?>
            </div>
            <div class="dex-clock" id="dex-tray-time" onclick="toggleWidgetState('time')" style="cursor:pointer"
                tabindex="0">12:00</div>
            <div onclick="toggleSettingsPanel()" tabindex="0">
                <?= render_svg_icon('cog')?>
            </div>
        </div>
    </div>
    <!-- END GOLDENDEX -->

    <div id="widgets-container">
        <div id="time-widget" class="widget">
            <div class="widget-header">
                <?= render_svg_icon('clock')?><span>Hora</span>
            </div>
            <div class="widget-body" id="current-time">00:00:00</div>
        </div>

        <div id="calendar-widget" class="widget">
            <div class="widget-header">
                <?= render_svg_icon('calendar')?><span>Calendário</span>
            </div>
            <div class="widget-body" id="current-date">Carregando...</div>
        </div>

        <div id="ping-widget" class="widget">
            <div class="widget-header">
                <?= render_svg_icon('server')?><span>Ping do Servidor</span>
            </div>
            <div class="widget-body" id="ping-value">-- ms</div>
        </div>

        <div id="music-widget" class="widget">
            <div class="widget-header">
                <?= render_svg_icon('music')?><span>Player de Música</span>
            </div>
            <div class="widget-body">
                <input type="file" id="music-folder-input" webkitdirectory directory multiple accept="audio/*">
                <button class="music-playlist-toggle" onclick="document.getElementById('music-folder-input').click()"
                    style="margin-bottom:10px;">
                    <?= render_svg_icon('folder-open')?> Escolher Pasta de Músicas
                </button>
                <div class="music-info" id="music-current-title">Nenhuma música tocando</div>
                <div class="music-controls">
                    <button class="music-btn" onclick="musicPrev()">
                        <?= render_svg_icon('backward')?>
                    </button>
                    <button class="music-btn play-btn" onclick="musicTogglePlay()" id="music-play-btn">
                        <?= render_svg_icon('play')?>
                    </button>
                    <button class="music-btn" onclick="musicNext()">
                        <?= render_svg_icon('forward')?>
                    </button>
                </div>
                <button class="music-playlist-toggle"
                    onclick="document.getElementById('music-playlist').classList.toggle('show')">
                    <?= render_svg_icon('list')?> Mostrar/Esconder Lista
                </button>
                <div class="music-playlist" id="music-playlist"></div>
            </div>
        </div>
    </div>


    <div class="settings-overlay" id="settings-overlay" onclick="closeSettingsPanel()">
    </div>
    <div class="settings-panel" id="settings-panel">
        <div class="settings-header">
            <span>Configurações</span>
            <button class="settings-close" onclick="closeSettingsPanel()">&times;</button>
        </div>

        <div class="settings-content">
            <div class="settings-section">
                <div class="section-title">Sistema & Modo</div>
                <div id="dex-premium-button" class="settings-btn dex-premium-btn" onclick="toggleDexMode()"
                    tabindex="0">
                    <span id="dex-button-text" style="font-weight: bold; width: 100%; text-align: center;">GoldenOS
                        Dex</span>
                </div>
            </div>

            <div class="settings-section">
                <div class="section-title">Widgets da Área de Trabalho</div>
                <label class="settings-btn" tabindex="0">
                    <?= render_svg_icon('clock')?> Widget de Hora
                    <label class="toggle-switch"><input type="checkbox" id="time-toggle"><span
                            class="toggle-slider"></span></label>
                </label>
                <label class="settings-btn" tabindex="0">
                    <?= render_svg_icon('calendar')?> Widget de Calendário
                    <label class="toggle-switch"><input type="checkbox" id="calendar-toggle"><span
                            class="toggle-slider"></span></label>
                </label>
                <label class="settings-btn" tabindex="0">
                    <?= render_svg_icon('server')?> Widget de Ping
                    <label class="toggle-switch"><input type="checkbox" id="ping-toggle"><span
                            class="toggle-slider"></span></label>
                </label>
                <label class="settings-btn" tabindex="0">
                    <?= render_svg_icon('music')?> Player de Música
                    <label class="toggle-switch"><input type="checkbox" id="music-toggle"><span
                            class="toggle-slider"></span></label>
                </label>
            </div>

            <div class="settings-section">
                <div class="section-title">Personalização</div>
                <button id="smart-options-btn" class="settings-btn" onclick="openSmartOptions()" tabindex="0">
                    <?= render_svg_icon('window-restore')?> Opções Inteligentes
                </button>
                <button class="settings-btn" onclick="openModal('dock-settings-modal'); closeSettingsPanel();"
                    tabindex="0">
                    <?= render_svg_icon('edit')?> Customizar Dock
                </button>
                <button class="settings-btn" onclick="openModal('wallpaper-modal'); closeSettingsPanel();" tabindex="0">
                    <?= render_svg_icon('image')?> Escolher Papel de Parede
                </button>

                <div class="settings-item-row">
                    <span class="item-label">Cor de Destaque</span>
                    <div class="item-controls">
                        <button onclick="resetAccentColor()" class="mini-btn" tabindex="0">Padrão</button>
                        <div id="accent-color-swatch" onclick="openColorProxy('accent')" class="color-swatch"
                            style="background:var(--gold);" tabindex="0"></div>
                    </div>
                </div>

                <div class="settings-item-row">
                    <span class="item-label">🎮 RGB Gamer</span>
                    <div class="item-controls">
                        <button id="rgb-speed-cycle-btn" onclick="cycleRgbSpeed();event.stopPropagation();"
                            class="mini-btn speed-btn" tabindex="0">1x</button>
                        <label class="toggle-switch"><input type="checkbox" id="rgb-gamer-toggle"
                                onchange="toggleRgbGamer(this.checked)"><span class="toggle-slider"></span></label>
                    </div>
                </div>

                <div class="settings-item-row">
                    <span class="item-label">Cor do Texto</span>
                    <div class="item-controls">
                        <button onclick="setAppTextColor('#ffffff')" class="mini-btn">Reset</button>
                        <div id="text-color-swatch" onclick="openColorProxy('text')" class="color-swatch"
                            style="background:var(--app-text-color);"></div>
                    </div>
                </div>

                <label class="settings-btn" style="margin-top: 5px;">
                    Ocultar Nomes
                    <label class="toggle-switch"><input type="checkbox" id="hide-names-toggle"><span
                            class="toggle-slider"></span></label>
                </label>
            </div>

            <?php if (isset($_SESSION['admin_error'])): ?>
            <div class="admin-error-box">
                <?= render_svg_icon('exclamation-triangle')?>
                <?= $_SESSION['admin_error']?>
                <?php unset($_SESSION['admin_error']); ?>
            </div>
            <?php
endif; ?>

            <div class="settings-section">
                <div class="section-title">Dados & Backup</div>
                <button class="settings-btn" onclick="openModal('backup-modal'); closeSettingsPanel();" tabindex="0">
                    <?= render_svg_icon('download')?> Exportar / Importar Dados
                </button>
            </div>

            <div class="settings-footer">
                <div>Created By: <strong>Alex Pereira Franco</strong></div>
                <div style="opacity: 0.7;">With Help: DeepSeek, Gemini, Antigravity</div>
            </div>
        </div>

        <!-- Custom Color Picker Popup (keeps picker on screen on all devices) -->
        <div id="color-picker-popup" style="display:none; position:fixed; inset:0; z-index:999999; align-items:center; justify-content:center;">
            <div id="color-picker-overlay" onclick="closeColorProxy()" style="position:absolute; inset:0; background:rgba(0,0,0,0.55); backdrop-filter:blur(4px);"></div>
            <div id="color-picker-box" style="position:relative; z-index:1; background:#1e1e2e; border:1px solid rgba(255,255,255,0.15); border-radius:18px; padding:28px 32px; display:flex; flex-direction:column; align-items:center; gap:18px; box-shadow:0 12px 40px rgba(0,0,0,0.7);">
                <div id="color-picker-label" style="color:#fff; font-size:1em; font-weight:600; opacity:0.85; letter-spacing:0.03em;">Escolher Cor</div>
                <input type="color" id="color-proxy-input" style="width:180px; height:100px; border:none; border-radius:12px; cursor:pointer; background:none; padding:0;">
                <button onclick="closeColorProxy()" style="background:var(--gold,#FFD700); color:#000; border:none; border-radius:10px; padding:10px 32px; font-weight:700; cursor:pointer; font-size:0.95em; letter-spacing:0.02em;">✓ Confirmar</button>
            </div>
        </div>

        <!-- Smart Options Sub-page -->
        <div id="settings-smart-options" style="display: none; padding: 0 20px 20px 20px; flex: 1; overflow-y: auto;">
            <div class="settings-section">
                <div class="section-title" style="display: flex; align-items: center;">
                    <button class="mini-btn" onclick="backToMainSettings()"
                        style="margin-right: 12px; padding: 6px 10px; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.1); border-radius: 6px;">
                        <?= render_svg_icon('chevron-left')?>
                    </button>
                    Opções Inteligentes
                </div>

                <label class="settings-btn"
                    style="display: flex; align-items: center; justify-content: space-between; padding: 12px; background: rgba(255,255,255,0.05); border-radius: 10px; margin-bottom: 10px; border: 1px solid rgba(255,255,255,0.05);">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <span style="color: var(--gold);">
                            <?= render_svg_icon('window-minimize')?>
                        </span>
                        <span>Minimizar Inteligente</span>
                    </div>
                    <label class="toggle-switch"><input type="checkbox" id="dex-smart-minimize-toggle" checked
                            onchange="updateSmartMinimize(this.checked)"><span class="toggle-slider"></span></label>
                </label>
                <label class="settings-btn"
                    style="display: flex; align-items: center; justify-content: space-between; padding: 12px; background: rgba(255,255,255,0.05); border-radius: 10px; margin-bottom: 10px; border: 1px solid rgba(255,255,255,0.05);">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <span style="color: var(--gold);">
                            <?= render_svg_icon('maximize')?>
                        </span>
                        <span>Redimensionamento Inteligente</span>
                    </div>
                    <label class="toggle-switch"><input type="checkbox" id="dex-smart-resize-toggle" checked
                            onchange="updateSmartResize(this.checked)"><span class="toggle-slider"></span></label>
                </label>
                <label class="settings-btn"
                    style="display: flex; align-items: center; justify-content: space-between; padding: 12px; background: rgba(255,255,255,0.05); border-radius: 10px; margin-bottom: 10px; border: 1px solid rgba(255,255,255,0.05);">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <span style="color: var(--gold);">
                            <?= render_svg_icon('window-restore')?>
                        </span>
                        <span>Bordas Inteligentes (Snap)</span>
                    </div>
                    <label class="toggle-switch"><input type="checkbox" id="dex-smart-edges-toggle" checked
                            onchange="updateSmartEdges(this.checked)"><span class="toggle-slider"></span></label>
                </label>
                <label class="settings-btn"
                    style="display: flex; align-items: center; justify-content: space-between; padding: 12px; background: rgba(255,255,255,0.05); border-radius: 10px; margin-bottom: 10px; border: 1px solid rgba(255,255,255,0.05);">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <span style="color: var(--gold);">
                            <?= render_svg_icon('trash')?>
                        </span>
                        <span>Ocultar lixeira de forma inteligente</span>
                    </div>
                    <label class="toggle-switch"><input type="checkbox" id="dex-smart-trash-toggle"
                            onchange="updateSmartTrash(this.checked)"><span class="toggle-slider"></span></label>
                </label>

                <p style="font-size: 0.8em; opacity: 0.6; margin-top: 15px; line-height: 1.4; padding: 0 5px;">
                    Estas opções automatizam o comportamento das janelas no modo Dex para garantir que elas nunca fiquem
                    inacessíveis.
                </p>
            </div>
            <div class="settings-footer">
                <div>Created By: <strong>Alex Pereira Franco</strong></div>
                <div style="opacity: 0.7;">With Help: DeepSeek, Gemini, Antigravity</div>
            </div>
        </div>
    </div>

    <!-- MODALS REMOVED -->

    <!-- Camada de wallpaper animado (por trás de tudo) -->
    <div id="wallpaper-layer"></div>

    <!-- WALLPAPER MODAL -->
    <div id="wallpaper-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    <?= render_svg_icon('image')?> Personalizar Wallpaper
                </h3>
                <button class="close-btn" onclick="closeModal('wallpaper-modal')">&times;</button>
            </div>

            <!-- Tabs -->
            <div class="wp-tabs">
                <button class="wp-tab active" id="wp-tab-static" onclick="switchWpTab('static')">
                    <?= render_svg_icon('image')?> Estático
                </button>
                <button class="wp-tab" id="wp-tab-animated" onclick="switchWpTab('animated')">
                    <?= render_svg_icon('magic')?> Animado
                </button>
            </div>

            <!-- Painel Estático -->
            <div class="wp-panel active" id="wp-panel-static">
                <h4 style="margin:0 0 10px;color:var(--gold);">Wallpapers Predefinidos</h4>
                <div class="wallpapers-grid" id="wallpapers-grid">
                    <?php foreach ($wallpapers as $wallpaper): ?>
                    <div class="wallpaper-thumb" style="background-image:url('<?= $wallpaper?>');"
                        data-src="<?= $wallpaper?>"></div>
                    <?php
endforeach; ?>
                </div>
                <div class="form-group" style="margin-top:10px;">
                    <label for="wallpaper-input">
                        <?= render_svg_icon('upload')?> Selecione uma imagem
                    </label>
                    <input type="file" id="wallpaper-input" accept="image/*">
                </div>
                <div class="wallpaper-preview" id="wallpaper-preview">
                    <div
                        style="display:flex;justify-content:center;align-items:center;height:100%;color:rgba(255,255,255,0.5);">
                        <?= render_svg_icon('image', 'fa-2x')?>
                    </div>
                </div>
                <div style="display:flex;gap:10px;margin-top:12px;">
                    <button onclick="saveWallpaper()" class="submit-btn" style="flex:1;">Salvar</button>
                    <button onclick="restoreDefaultWallpaper()" class="submit-btn"
                        style="flex:1;background:#6c757d;">Restaurar Padrão</button>
                </div>
            </div>

            <!-- Painel Animado -->
            <div class="wp-panel" id="wp-panel-animated">
                <h4 style="margin:0 0 10px;color:var(--gold);">Papéis de Parede Animados</h4>
                <?php if (!empty($animatedWallpapers)): ?>
                <div class="anim-wp-grid" id="anim-wp-grid">
                    <?php foreach ($animatedWallpapers as $awp):
        $rawFile = $awp['file'];
        // Avoid double prefixing if the file path in index.json already includes it
        $wpFile = (strpos($rawFile, $wallpapersDir) === 0) ? $rawFile : $wallpapersDir . $rawFile;
?>
                    <div class="anim-wp-card" data-file="<?= htmlspecialchars($wpFile)?>"
                        data-name="<?= htmlspecialchars($awp['name'])?>" onclick="selectAnimatedWallpaper(this)">
                        <div class="anim-preview">🎬</div>
                        <div class="anim-name">
                            <?= htmlspecialchars($awp['name'])?>
                        </div>
                    </div>
                    <?php
    endforeach; ?>
                </div>
                <?php
else: ?>
                <div class="no-anim-wp">
                    <?= render_svg_icon('film')?>
                    Nenhum wallpaper animado encontrado.<br>
                    Adicione arquivos JSON em <code>wallpapers/index.json</code>.
                </div>
                <?php
endif; ?>
                <div style="display:flex;gap:10px;margin-top:12px;">
                    <button onclick="applySelectedAnimatedWallpaper()" class="submit-btn"
                        style="flex:1;">Aplicar</button>
                    <button onclick="removeAnimatedWallpaper()" class="submit-btn"
                        style="flex:1;background:#6c757d;">Remover</button>
                </div>
            </div>
        </div>
    </div>

    <!-- DOCK SETTINGS MODAL -->
    <div id="dock-settings-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    <?= render_svg_icon('dock')?> Personalizar Dock
                </h3>
                <button class="close-btn" onclick="closeModal('dock-settings-modal')">&times;</button>
            </div>
            <div id="dock-preview"></div>
            <div id="dock-form">
                <?php
$all_apps = [];
foreach (['apps', 'downloads', 'webs', 'games'] as $cat) {
    if (isset($apps[$cat]) && is_array($apps[$cat])) {
        foreach ($apps[$cat] as $id => $app) {
            $app['category'] = $cat; // Inject category for Dex filtering
            $all_apps[$id] = $app;
        }
    }
}
for ($i = 1; $i <= 3; $i++):
?>
                <div style="margin-bottom:10px;">
                    <label for="dock-app-<?= $i?>" style="color:var(--gold);display:block;margin-bottom:5px;">Ícone
                        <?= $i?>:
                    </label>
                    <select id="dock-app-<?= $i?>" class="dock-app-select"
                        style="width:100%;padding:8px;border-radius:8px;border:1px solid var(--glass-border);background:#1e1e1e;color:var(--light);">
                        <option value="">-- Nenhum --</option>
                        <?php foreach ($all_apps as $id => $app): ?>
                        <option value="<?= $id?>">
                            <?= htmlspecialchars($app['name'])?>
                        </option>
                        <?php
    endforeach; ?>
                    </select>
                </div>
                <?php
endfor; ?>
                <button onclick="saveDockConfig()" class="submit-btn" style="margin-top:10px;">Salvar
                    Configuração</button>

                <!-- Barra de Tarefas (Dex) inside Dock Modal -->
                <div id="dex-settings-section"
                    style="display: none; margin-top: 20px; border-top: 1px solid var(--glass-border); padding-top: 20px;">
                    <div class="section-title" style="margin-bottom: 15px; color: var(--gold); font-weight: bold;">
                        Visibilidade da Barra (DEX)</div>
                    <label class="settings-btn"
                        style="display: flex; align-items: center; justify-content: space-between; padding: 10px; background: rgba(255,255,255,0.05); border-radius: 8px; margin-bottom: 8px;">
                        <span>
                            <?= render_svg_icon('clock')?> Hora
                        </span>
                        <label class="toggle-switch"><input type="checkbox" id="dex-tray-time-toggle" checked
                                onchange="updateDexTrayVisibility('time', this.checked)"><span
                                class="toggle-slider"></span></label>
                    </label>
                    <label class="settings-btn"
                        style="display: flex; align-items: center; justify-content: space-between; padding: 10px; background: rgba(255,255,255,0.05); border-radius: 8px; margin-bottom: 8px;">
                        <span>
                            <?= render_svg_icon('calendar')?> Data / Calendário
                        </span>
                        <label class="toggle-switch"><input type="checkbox" id="dex-tray-calendar-toggle" checked
                                onchange="updateDexTrayVisibility('calendar', this.checked)"><span
                                class="toggle-slider"></span></label>
                    </label>
                    <label class="settings-btn"
                        style="display: flex; align-items: center; justify-content: space-between; padding: 10px; background: rgba(255,255,255,0.05); border-radius: 8px; margin-bottom: 8px;">
                        <span>
                            <?= render_svg_icon('server')?> Ping
                        </span>
                        <label class="toggle-switch"><input type="checkbox" id="dex-tray-ping-toggle" checked
                                onchange="updateDexTrayVisibility('ping', this.checked)"><span
                                class="toggle-slider"></span></label>
                    </label>
                    <label class="settings-btn"
                        style="display: flex; align-items: center; justify-content: space-between; padding: 10px; background: rgba(255,255,255,0.05); border-radius: 8px; margin-bottom: 8px;">
                        <span>
                            <?= render_svg_icon('music')?> Música
                        </span>
                        <label class="toggle-switch"><input type="checkbox" id="dex-tray-music-toggle" checked
                                onchange="updateDexTrayVisibility('music', this.checked)"><span
                                class="toggle-slider"></span></label>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Paste the long Base64 strings here:
        const DEX_START_ICON_BASE64 = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAa4AAAGHCAYAAADoVrZkAAAACXBIWXMAAAsTAAALEwEAmpwYAAAgAElEQVR4Aey9C7C2+1nW97yndfwOe3/fzt7ZYSfZCZgQziGhARJLJGAFUgQKgggdRyoqw4jailY7U4YRijBq22Fs7XiaMg61tLW22s7g0Kat2nGK1XZQ5Jig0U2yd5J93t9prdXrd133/X+etbIT9zEk2P+3nud/H677uv/H53ned73v+lZn3/d90wde/59N9x18YJq+aZre/xMPTJd22+nOen+65x/83PTIG9843bP5uemhO2+YLm9PpzuraXrkeJqmD0/T3uMPT6eHd0+HmyvTfa++Nj364X8+ndy+Pd2ZNtPZ06vp6Pp2un3j1nT7qaenV/7TX50e//w3TE998Mnp6P4r06nsq+1mevLOM9Px3tF09z/8+enGF71pun3nZPqnN7fTa5TrdK323FpP99+6NW0u75T0bPoHV145febD758ODzbTdn8XnvV6uvTuf7Ka3vPO/See/BeXttO0P53srVeH6+1qs9qtpoPtdHZns9ps1hPHWsfqTD1RWW1X0+q0ZNlOpG9WZ/adqSYtBRzljrDbdfwit43TVtjTzWnDp7Ua5fjKA+Zsr+LEcSaO7eY07SD/iFSu4iXe7VSPKIbA1+2jHTJ2+zerE/OCxcYA27dWjLBnp+KTTO4JeacRBodfZX12Z9IwOc/ZifA7te9EPtoj/XR94hrs2Ub+s9NpSwyTfkvH7s60L9vqmRvTA69+/PThW3emG08rUsOoNTWd3pqmZz48nV5+YFrfvqM23tA6+sh0es99aprm+NbNaXrdn5/u/Mp3T9uPPDmd3ndVuCem093laX1Hvlf/59PNX/qOabO3nbY3xbW/N02Pf3i6uX80bSdN7fvfO02vvFtDck1NOplOVprm1e1p7w0/Rotdbv7MN0zq8LR380PSn1AbXjlNN7WY72ynGzst7PXpdHD7qWm6vZve//DN6YHXK8/B6yv6eVQPP/w8wOehDz3589P9z7xd+/Enpg/85OdNR0+pDSofeuzGdPcVjSN7Z389Xbn+4PTo+9433blyNu2dHU23mOWT21p6Amsp3HjsGU/P/rV7pjt3bk+3b59O937re6eP/LU3TDvJk3bKydMn0/7R3nTz5s1pu91Ot565Na33N9PpzZNp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"; // Paste the Dex Start button Base64 here

        const TRASH_ICON_BASE64 = "data:image/png;base64,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";

        const allApps = <?= json_encode($all_apps) ?>;
        const animatedWallpapers = <?= json_encode($animatedWallpapers) ?>;

        // ---- Wallpaper Tab Switch ----
        function switchWpTab(tab) {
            ['static', 'animated'].forEach(t => {
                document.getElementById('wp-tab-' + t).classList.toggle('active', t === tab);
                document.getElementById('wp-panel-' + t).classList.toggle('active', t === tab);
            });
        }

        // ---- Animated Wallpaper ----
        let _pendingAnimFile = null;
        let _animRafId = null;

        function selectAnimatedWallpaper(card) {
            document.querySelectorAll('.anim-wp-card').forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
            _pendingAnimFile = card.dataset.file;

            // Immediate Persistence (as requested by user)
            localStorage.setItem('goldenos_animated_wallpaper', _pendingAnimFile);
            localStorage.removeItem('goldenos_wallpaper');
            document.body.classList.remove('custom-wallpaper');
            document.body.style.backgroundImage = '';
            _loadAndRenderAnimated(_pendingAnimFile);
        }

        function applySelectedAnimatedWallpaper() {
            if (!_pendingAnimFile) { showToast('Selecione um wallpaper animado primeiro.', 'error'); return; }
            localStorage.setItem('goldenos_animated_wallpaper', _pendingAnimFile);
            // Remove wallpaper estático ao ativar animado
            localStorage.removeItem('goldenos_wallpaper');
            document.body.classList.remove('custom-wallpaper');
            document.body.style.backgroundImage = '';
            _loadAndRenderAnimated(_pendingAnimFile);
            closeModal('wallpaper-modal');
        }

        function removeAnimatedWallpaper() {
            localStorage.removeItem('goldenos_animated_wallpaper');
            _clearAnimated();
            closeModal('wallpaper-modal');
        }

        function _clearAnimated() {
            if (_animRafId) { cancelAnimationFrame(_animRafId); _animRafId = null; }
            const layer = document.getElementById('wallpaper-layer');
            layer.innerHTML = '';
            layer.style.backgroundImage = '';
            layer.style.display = 'none';
            // Restore default gradient
            document.body.style.background = '';
        }

        function _loadAndRenderAnimated(file) {
            _clearAnimated();
            // Fix double prefixing if it exists in stored data
            if (file && file.startsWith('wallpapers/wallpapers/')) {
                file = file.replace('wallpapers/wallpapers/', 'wallpapers/');
            }
            if (!file) return;

            fetch(file)
                .then(r => {
                    if (!r.ok) throw new Error('Arquivo não encontrado: ' + file);
                    return r.json();
                })
                .then(data => {
                    const layer = document.getElementById('wallpaper-layer');
                    layer.style.display = 'block';
                    // Hide body background to reveal animation
                    document.body.style.background = 'transparent';

                    if (data.type === 'shader') {
                        _renderShader(layer, data);
                    } else {
                        _renderSVG(layer, data);
                    }
                    console.log("[GoldenOS] Animated wallpaper applied:", file);
                })
                .catch(err => {
                    console.error('Wallpaper animado:', err);
                    _clearAnimated();
                    showToast('Erro ao carregar wallpaper animado: ' + err.message, 'error');
                });
        }

        /* ---- SVG Renderer ---- */

        // Campos que não são atributos SVG (meta-dados do JSON)
        const _SVG_META = new Set([
            'tag', 'el', 'element',
            'children', 'animations', 'nodes', 'child',
            'style', 'css', 'text', 'content', 'textContent',
            'attrs', 'attributes', 'props', 'attr',
            'config', 'defs', 'definitions', 'elements', 'shapes', 'objects'
        ]);

        // Atributos SVG que DEVEM continuar em camelCase (especialmente SMIL animations e ViewBox)
        const _SVG_CAMEL_ATTRS = new Set([
            'attributeName', 'repeatCount', 'viewBox', 'stdDeviation', 'baseFrequency', 'numOctaves', 'attributeType'
        ]);

        const _SVG_NS = (() => {
            const t = document.createElement('div');
            t.innerHTML = '<svg></svg>';
            return t.firstChild.namespaceURI;
        })();

        // camelCase → kebab-case (exceto para os atributos que o SVG exige em camelCase)
        function _toSvgAttr(k) {
            if (_SVG_CAMEL_ATTRS.has(k)) return k;
            if (k === 'className') return 'class';
            return k.replace(/([A-Z])/g, m => '-' + m.toLowerCase());
        }

        function _renderSVG(layer, data) {
            const cfg = data.config || {};
            const svg = document.createElementNS(_SVG_NS, 'svg');

            // viewBox
            const vbRaw = cfg.viewBox || cfg.viewbox || '0 0 1000 1000';
            const vb = typeof vbRaw === 'object'
                ? `${vbRaw.x || 0} ${vbRaw.y || 0} ${vbRaw.w || vbRaw.width || 1000} ${vbRaw.h || vbRaw.height || 1000}`
                : String(vbRaw);
            svg.setAttribute('viewBox', vb);
            svg.setAttribute('width', '100%');
            svg.setAttribute('height', '100%');
            svg.setAttribute('preserveAspectRatio', 'xMidYMid slice');
            svg.style.cssText = 'position:absolute;inset:0;width:100%;height:100%;display:block;';

            const vbParts = vb.split(/[\s,]+/).map(Number);
            const [vx, vy, vw, vh] = vbParts.length === 4 ? vbParts : [0, 0, 1000, 1000];

            // Background: gradient CSS vai no layer div, cor sólida vira rect SVG
            const bg = cfg.bg || cfg.background || '#000';
            if (bg.includes('gradient') || bg.startsWith('url')) {
                layer.style.background = bg;
            } else {
                const bgRect = document.createElementNS(_SVG_NS, 'rect');
                bgRect.setAttribute('x', vx); bgRect.setAttribute('y', vy);
                bgRect.setAttribute('width', vw); bgRect.setAttribute('height', vh);
                bgRect.setAttribute('fill', bg);
                svg.appendChild(bgRect);
            }

            // defs — aceita vários nomes de campo
            const defsArr = data.defs || data.definitions || [];
            if (defsArr.length) {
                const defs = document.createElementNS(_SVG_NS, 'defs');
                defsArr.forEach(d => defs.appendChild(_buildSVGEl(d, _SVG_NS)));
                svg.appendChild(defs);
            }

            // elements — aceita vários nomes de campo
            const elsArr = data.elements || data.shapes || data.objects || data.children || [];
            elsArr.forEach(el => svg.appendChild(_buildSVGEl(el, _SVG_NS)));

            // Auto-stars
            if (cfg.stars) {
                const count = (typeof cfg.stars === 'object' ? cfg.stars.count : cfg.stars) || 40;
                for (let i = 0; i < count; i++) {
                    const c = document.createElementNS(_SVG_NS, 'circle');
                    c.setAttribute('cx', vx + Math.random() * vw);
                    c.setAttribute('cy', vy + Math.random() * vh);
                    c.setAttribute('r', Math.random() * 1.5 + 0.5);
                    c.setAttribute('fill', 'white');
                    const a = document.createElementNS(_SVG_NS, 'animate');
                    a.setAttribute('attributeName', 'opacity');
                    a.setAttribute('values', '0.2;1;0.2');
                    a.setAttribute('dur', (Math.random() * 3 + 2) + 's');
                    a.setAttribute('repeatCount', 'indefinite');
                    a.setAttribute('begin', (Math.random() * 3) + 's');
                    c.appendChild(a);
                    svg.appendChild(c);
                }
            }

            // glow overlay
            if (cfg.glow) {
                const g = document.createElementNS(_SVG_NS, 'rect');
                g.setAttribute('x', vx); g.setAttribute('y', vy);
                g.setAttribute('width', vw); g.setAttribute('height', vh);
                g.setAttribute('fill', cfg.glow);
                svg.appendChild(g);
            }

            layer.appendChild(svg);
            console.log('[GoldenOS] SVG:', elsArr.length, 'elem,', defsArr.length, 'defs, viewBox:', vb);
        }

        function _buildSVGEl(def, ns) {
            if (!def || typeof def !== 'object') return document.createElementNS(ns, 'g');

            let tag = def.tag || def.el || def.element;
            if (!tag && def.children) tag = 'g';
            if (!tag && def.attributeName) tag = 'animate';
            const el = document.createElementNS(ns, tag || 'g');

            // Todos os campos raiz que não são meta-dados são atributos SVG
            // camelCase → kebab-case (ex: stopColor → stop-color), preservando camelCase onde necessário
            // className → class
            Object.entries(def).forEach(([k, v]) => {
                if (_SVG_META.has(k) || v === null || v === undefined) return;
                // Exceção: 'type' funciona como meta-dado NA RAIZ do JSON config, mas em animações (SMIL) indica o tipo de transform.
                // Aqui no _buildSVGEl() se chegou um 'type' e é SMIL ou filter, passamos pro SVG.
                el.setAttribute(_toSvgAttr(k), String(v));
            });

            // Estilo inline (objeto ou string)
            const style = def.style || def.css;
            if (style && typeof style === 'object') {
                Object.entries(style).forEach(([k, v]) => { el.style[k] = v; });
            } else if (typeof style === 'string') {
                el.style.cssText = style;
            }

            // Conteúdo de texto
            const txt = def.text ?? def.content ?? def.textContent ?? null;
            if (txt !== null) el.textContent = String(txt);

            // Filhos
            const kids = def.children || def.nodes || def.child || [];
            (Array.isArray(kids) ? kids : [kids]).forEach(ch => {
                if (ch) el.appendChild(_buildSVGEl(ch, ns));
            });

            // Animações (array separado de children no formato JSON real)
            const anims = def.animations || [];
            anims.forEach(a => el.appendChild(_buildSVGEl(a, ns)));

            return el;
        }

        /* ---- WebGL Shader Renderer ---- */
        function _renderShader(layer, data) {
            const canvas = document.createElement('canvas');
            canvas.style.cssText = 'position:absolute;inset:0;width:100%;height:100%;';
            layer.appendChild(canvas);

            const gl = canvas.getContext('webgl2') || canvas.getContext('webgl');
            if (!gl) { console.error('WebGL não suportado'); return; }

            const vsrc = `attribute vec2 pos; void main(){ gl_Position=vec4(pos,0,1); }`;
            const fsrc = data.shader || 'precision mediump float; uniform float time; uniform vec2 resolution; void main(){ gl_FragColor=vec4(0,0,0,1); }';

            function _shader(type, src) {
                const s = gl.createShader(type);
                gl.shaderSource(s, src); gl.compileShader(s);
                if (!gl.getShaderParameter(s, gl.COMPILE_STATUS)) { console.error(gl.getShaderInfoLog(s)); return null; }
                return s;
            }

            const prog = gl.createProgram();
            const vs = _shader(gl.VERTEX_SHADER, vsrc);
            const fs = _shader(gl.FRAGMENT_SHADER, fsrc);
            if (!vs || !fs) return;
            gl.attachShader(prog, vs); gl.attachShader(prog, fs);
            gl.linkProgram(prog); gl.useProgram(prog);

            const buf = gl.createBuffer();
            gl.bindBuffer(gl.ARRAY_BUFFER, buf);
            gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([-1, -1, 1, -1, -1, 1, 1, 1]), gl.STATIC_DRAW);
            const posLoc = gl.getAttribLocation(prog, 'pos');
            gl.enableVertexAttribArray(posLoc);
            gl.vertexAttribPointer(posLoc, 2, gl.FLOAT, false, 0, 0);

            const timeLoc = gl.getUniformLocation(prog, 'time');
            const resLoc = gl.getUniformLocation(prog, 'resolution');

            function resize() {
                canvas.width = layer.offsetWidth || window.innerWidth;
                canvas.height = layer.offsetHeight || window.innerHeight;
                gl.viewport(0, 0, canvas.width, canvas.height);
            }
            resize();
            window.addEventListener('resize', resize);

            const t0 = performance.now();
            function frame() {
                _animRafId = requestAnimationFrame(frame);
                gl.uniform1f(timeLoc, (performance.now() - t0) / 1000);
                gl.uniform2f(resLoc, canvas.width, canvas.height);
                gl.drawArrays(gl.TRIANGLE_STRIP, 0, 4);
            }
            frame();
        }

        function _initAnimatedWallpaper() {
            const saved = localStorage.getItem('goldenos_animated_wallpaper');
            if (saved) _loadAndRenderAnimated(saved);
        }

        // ---- GoldenDex Logic & Window Manager ----
        // --- Global Helpers ---
        function getDexGridSize() {
            const isMobile = window.innerWidth <= 768;
            const isLandscape = window.innerHeight < 500;
            if (isMobile || isLandscape) {
                return { w: 72, h: 90, m: 5 }; // More compact grid and margin
            }
            return { w: 90, h: 110, m: 10 };
        }

        function getDexGridInfo() {
            const grid = getDexGridSize();
            const cols = Math.max(1, Math.floor((window.innerWidth - 2 * grid.m) / grid.w));
            const rows = Math.max(1, Math.floor((window.innerHeight - 50 - 2 * grid.m) / grid.h));
            const extraX = cols > 1 ? (window.innerWidth - 2 * grid.m - (cols * grid.w)) / (cols - 1) : 0;
            const extraY = rows > 1 ? (window.innerHeight - 50 - 2 * grid.m - (rows * grid.h)) / (rows - 1) : 0;
            
            return { 
                ...grid, cols, rows, extraX, extraY,
                getCoords: (c, r) => ({
                    x: Math.round(c * (grid.w + extraX) + grid.m),
                    y: Math.round(r * (grid.h + extraY) + grid.m)
                }),
                getIndices: (x, y) => ({
                    c: Math.max(0, Math.min(cols - 1, Math.round((x - grid.m) / (grid.w + extraX)))),
                    r: Math.max(0, Math.min(rows - 1, Math.round((y - grid.m) / (grid.h + extraY))))
                })
            };
        }

        function getDexTrashCoords() {
            const info = getDexGridInfo();
            return info.getCoords(info.cols - 1, info.rows - 1);
        }

        function safeJSONParse(key, fallback = []) {
            try {
                const item = localStorage.getItem(key);
                if (item === null || item === "undefined" || item === "") return fallback;
                return JSON.parse(item) || fallback;
            } catch (e) {
                console.error(`Error parsing ${key}:`, e);
                return fallback;
            }
        }

        let isDexMode = localStorage.getItem('goldenos_dex_mode') === 'true';
        let openDexWindows = [];
        let dexZIndexCounter = 1000;

        function initDexMode() {
            const btnText = document.getElementById('dex-button-text');
            const dexSettings = document.getElementById('dex-settings-section');
            const smartBtn = document.getElementById('smart-options-btn');

            if (btnText) {
                btnText.textContent = isDexMode ? 'Sair GoldenOS Dex' : 'GoldenOS Dex';
            }
            if (dexSettings) {
                dexSettings.style.display = isDexMode ? 'block' : 'none';
            }
            if (smartBtn) {
                smartBtn.style.display = isDexMode ? 'flex' : 'none';
            }

            // Swap Dex Start button icon if Base64 provided
            const dexStartBtn = document.querySelector('.dex-start-btn');
            if (isDexMode && dexStartBtn && typeof DEX_START_ICON_BASE64 !== 'undefined' && DEX_START_ICON_BASE64 !== "") {
                dexStartBtn.innerHTML = `<img src="${DEX_START_ICON_BASE64}" style="width:20px;height:20px;display:block;">`;
            }

            const goldendex = document.getElementById('goldendex');
            const mainContent = document.getElementById('main-content');
            const widgetsContainer = document.getElementById('widgets-container');

            if (isDexMode) {
                document.documentElement.classList.add('dex-mode');
                document.body.classList.add('dex-mode');
                if (goldendex) goldendex.style.display = 'flex';
                if (mainContent) mainContent.style.display = 'none';
                if (widgetsContainer) widgetsContainer.style.display = 'block';

                const animText = document.getElementById('startup-logo-text');
                if (animText) animText.textContent = 'GoldenOS Dex';

                renderDexStartMenu('tudo');
                renderDexDesktop();
                renderDexFavorites();
                loadDexTraySettings(); // Ensure tray visibility settings are applied
                if (window.dexClockInterval) clearInterval(window.dexClockInterval);
                window.dexClockInterval = setInterval(updateDexClock, 60000);
            } else {
                document.documentElement.classList.remove('dex-mode');
                document.body.classList.remove('dex-mode');
                if (goldendex) goldendex.style.display = 'none';
                if (mainContent) mainContent.style.display = 'block';
                if (widgetsContainer) widgetsContainer.style.display = 'block';
            }

            renderDexTaskbar();
        }

        function toggleDexMode() {
            isDexMode = !isDexMode;
            localStorage.setItem('goldenos_dex_mode', isDexMode);
            playModeSwitchAnimation();
        }

        function playModeSwitchAnimation(isInitialLoad = false) {
            const animDiv = document.getElementById('startup-animation');
            const textDiv = animDiv.querySelector('.logo-text');
            const mainContent = document.getElementById('main-content');
            const dexDesktop = document.getElementById('dex-desktop');
            const dexTaskbar = document.getElementById('dex-taskbar');

            if (!isInitialLoad && typeof closeSettingsPanel === 'function') {
                closeSettingsPanel();
            }

            textDiv.innerText = isDexMode ? 'GoldenOS Dex' : 'GoldenOS';
            animDiv.style.display = 'flex';
            animDiv.style.opacity = '1';

            mainContent.style.display = 'none';
            if (dexDesktop) dexDesktop.style.setProperty('display', 'none', 'important');
            if (dexTaskbar) dexTaskbar.style.setProperty('display', 'none', 'important');

            setTimeout(() => {
                if (isDexMode) {
                    initDexMode();
                } else {
                    document.documentElement.classList.remove('dex-mode');
                    document.body.classList.remove('dex-mode');
                    const btnText = document.getElementById('dex-button-text');
                    if (btnText) btnText.textContent = 'GoldenOS Dex';
                    if (window.dexClockInterval) clearInterval(window.dexClockInterval);
                    const dexStartMenu = document.getElementById('dex-start-menu');
                    if (dexStartMenu) dexStartMenu.classList.remove('show');
                }

                animDiv.style.opacity = '0';

                setTimeout(() => {
                    animDiv.style.display = 'none';
                    animDiv.style.opacity = '1';

                    if (isDexMode) {
                        if (dexDesktop) dexDesktop.style.setProperty('display', 'flex', 'important');
                        if (dexTaskbar) dexTaskbar.style.setProperty('display', 'flex', 'important');
                    } else {
                        mainContent.style.display = 'block';
                    }
                }, 500);
            }, 2000);
        }

        function toggleDexStartMenu(e) {
            if (e) e.stopPropagation();
            const sm = document.getElementById('dex-start-menu');
            sm.classList.toggle('show');
            if (sm.classList.contains('show')) {
                // Focus search or first app when opening
                setTimeout(() => {
                    const search = document.getElementById('dex-search-input');
                    if (search) updateFocus(search);
                }, 100);
            }
        }

        document.addEventListener('click', function (e) {
            if (isDexMode) {
                const sm = document.getElementById('dex-start-menu');
                const btn = document.querySelector('.dex-start-btn');
                if (sm && sm.classList.contains('show') && btn && !sm.contains(e.target) && !btn.contains(e.target)) {
                    sm.classList.remove('show');
                }
            }
        });

        function updateDexClock() {
            const n = new Date();
            const clockEl = document.getElementById('dex-clock');
            if (clockEl) {
                clockEl.textContent = `${n.getHours().toString().padStart(2, '0')}:${n.getMinutes().toString().padStart(2, '0')}`;
            }
        }

        function addMobileDragToDesktop(div, appData) {
            let ghost = null;
            let startX, startY;
            let isDragging = false;
            let pressTimer = null;
            let canDrag = false;

            div.addEventListener('touchstart', (e) => {
                startX = e.touches[0].clientX;
                startY = e.touches[0].clientY;
                isDragging = false;
                canDrag = false;

                // Require a 500ms long-press to initiate a drag
                pressTimer = setTimeout(() => {
                    canDrag = true;
                    div.style.opacity = '0.5'; // Visual feedback for draggable state
                }, 500);
            }, { passive: true });

            div.addEventListener('touchmove', (e) => {
                const dx = Math.abs(e.touches[0].clientX - startX);
                const dy = Math.abs(e.touches[0].clientY - startY);

                // If they move too much before the timer fires, it's a scroll, cancel the drag intent
                if (!canDrag && (dx > 10 || dy > 10)) {
                    clearTimeout(pressTimer);
                    return;
                }

                if (canDrag && !isDragging && (dx > 10 || dy > 10)) {
                    isDragging = true;
                    div.style.opacity = '1'; // Reset original
                    ghost = div.cloneNode(true);
                    ghost.style.position = 'fixed';
                    ghost.style.opacity = '0.8';
                    ghost.style.pointerEvents = 'none';
                    ghost.style.zIndex = '9999999';
                    document.body.appendChild(ghost);
                }

                if (isDragging && ghost) {
                    ghost.style.left = (e.touches[0].clientX - ghost.offsetWidth / 2) + 'px';
                    ghost.style.top = (e.touches[0].clientY - ghost.offsetHeight / 2) + 'px';
                    e.preventDefault(); // Prevent scrolling once actively dragging
                }
            }, { passive: false });

            div.addEventListener('touchend', (e) => {
                clearTimeout(pressTimer);
                div.style.opacity = '1';

                if (isDragging && ghost) {
                    // Temporarily hide ghost to find drop target
                    ghost.style.display = 'none';
                    const target = document.elementFromPoint(e.changedTouches[0].clientX, e.changedTouches[0].clientY);

                    // Accept drop if it's over the desktop, or if we dragged far enough away from the start menu
                    if (target && (target.closest('#dex-desktop') || target.closest('body.dex-mode'))) {
                        const current = safeJSONParse('goldenos_dex_desktop');
                        if (!current.find(i => i.file === appData.file)) {
                            current.push(appData);
                            localStorage.setItem('goldenos_dex_desktop', JSON.stringify(current));
                            renderDexDesktop();
                        }
                        const sm = document.getElementById('dex-start-menu');
                        if (sm) sm.classList.remove('show');
                    }

                    if (ghost && ghost.parentNode) ghost.parentNode.removeChild(ghost);
                    ghost = null;
                    isDragging = false;
                }
            });

            div.addEventListener('touchcancel', () => {
                clearTimeout(pressTimer);
                div.style.opacity = '1';
                if (ghost && ghost.parentNode) ghost.parentNode.removeChild(ghost);
                ghost = null;
                isDragging = false;
            });
        }

        function renderDexStartMenu(category) {
            const container = document.getElementById('dex-start-apps');
            if (!container) return;
            container.innerHTML = '';

            const customWebs = safeJSONParse('goldenos_custom_webs');
            const customApps = safeJSONParse('goldenos_custom_apps');
            const customGames = safeJSONParse('goldenos_custom_games');
            const customDownloads = safeJSONParse('goldenos_custom_downloads');
            const appsToRender = { ...allApps };
            customWebs.forEach(web => { appsToRender[web.id] = web; });
            customApps.forEach(app => { appsToRender[app.id] = app; });
            customGames.forEach(game => { appsToRender[game.id] = game; });
            customDownloads.forEach(dl => { appsToRender[dl.id] = dl; });

            Object.entries(appsToRender).forEach(([id, app]) => {
                const appCat = app.category || 'apps';
                if (category !== 'tudo' && appCat !== category) return;

                const div = document.createElement('div');
                div.className = 'dex-start-app';
                if (app.isCustom) div.classList.add('custom-app');

                // Safe property access
                const appName = app.name || 'App';
                const appFile = app.file || '';
                const appIcon = app.icon || '';

                div.onclick = () => { openApp(appFile, appName, appIcon); toggleDexStartMenu(); };

                div.setAttribute('tabindex', '0');
                div.draggable = true;
                div.ondragstart = (e) => {
                    e.dataTransfer.setData('text/plain', JSON.stringify({ id, name: appName, file: appFile, icon: appIcon }));
                };
                addMobileDragToDesktop(div, { id, name: appName, file: appFile, icon: appIcon });

                let iconHtml = renderSvgIcon('android');
                if (appIcon && appIcon.trim()) {
                    const isBase64 = appIcon.startsWith('data:');
                    const iconSrc = isBase64 ? appIcon : `icons/${appIcon}`;
                    iconHtml = `<img src="${iconSrc}" draggable="false" oncontextmenu="return false;" onerror="this.outerHTML=renderSvgIcon('android')">`;
                } else if (appFile && appFile.startsWith('http')) {
                    iconHtml = renderSvgIcon('link');
                }

                const iconSpan = document.createElement('span');
                div.innerHTML += iconHtml;
                div.appendChild(iconSpan);
                iconSpan.textContent = appName;
                container.appendChild(div);
            });

            if (category === 'webs' || category === 'tudo') {
                const addBtn = document.createElement('div');
                addBtn.className = 'dex-start-app add-app-btn';
                addBtn.innerHTML = `${renderSvgIcon('plus')}<span>Novo Site</span>`;
                addBtn.onclick = openAddWebModal;
                container.appendChild(addBtn);
            }

            if (category === 'games' || category === 'tudo') {
                const addGameBtn = document.createElement('div');
                addGameBtn.className = 'dex-start-app add-app-btn';
                addGameBtn.innerHTML = `${renderSvgIcon('plus')}<span>Novo Jogo</span>`;
                addGameBtn.onclick = openAddGameModal;
                container.appendChild(addGameBtn);
            }

            if (category === 'apps' || category === 'tudo') {
                const addAppBtn = document.createElement('div');
                addAppBtn.className = 'dex-start-app add-app-btn';
                addAppBtn.innerHTML = `${renderSvgIcon('plus')}<span>Novo App</span>`;
                addAppBtn.onclick = openAddAppModal;
                container.appendChild(addAppBtn);
            }

            if (category === 'downloads' || category === 'tudo') {
                const addDownloadBtn = document.createElement('div');
                addDownloadBtn.className = 'dex-start-app add-app-btn';
                addDownloadBtn.innerHTML = `${renderSvgIcon('plus')}<span>Novo Download</span>`;
                addDownloadBtn.onclick = openAddDownloadModal;
                container.appendChild(addDownloadBtn);
            }
        }

        function changeDexCategory(cat, btn) {
            document.querySelectorAll('.dex-start-cat-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            // Clear search when changing category for a better UX
            const searchInput = document.getElementById('dex-search-input');
            if (searchInput) searchInput.value = '';

            renderDexStartMenu(cat);
        }

        function filterDexApps() {
            const term = document.getElementById('dex-search-input').value.toLowerCase();
            const container = document.getElementById('dex-start-apps');
            if (!container) return;
            container.innerHTML = '';

            // Get active category to search within it
            const activeBtn = document.querySelector('.dex-start-cat-btn.active');
            const category = activeBtn ? activeBtn.dataset.cat : 'tudo';

            const customWebs = safeJSONParse('goldenos_custom_webs');
            const customApps = safeJSONParse('goldenos_custom_apps');
            const customGames = safeJSONParse('goldenos_custom_games');
            const customDownloads = safeJSONParse('goldenos_custom_downloads');
            const appsToRender = { ...allApps };
            customWebs.forEach(web => { appsToRender[web.id] = web; });
            customApps.forEach(app => { appsToRender[app.id] = app; });
            customGames.forEach(game => { appsToRender[game.id] = game; });
            customDownloads.forEach(dl => { appsToRender[dl.id] = dl; });

            Object.entries(appsToRender).forEach(([id, app]) => {
                // Filter by name AND category - with safeguards
                const name = (app.name || '').toLowerCase();
                if (!name.includes(term)) return;

                const appCat = app.category || 'apps';
                if (category !== 'tudo' && appCat !== category) return;

                const div = document.createElement('div');
                div.className = 'dex-start-app';
                if (app.isCustom) div.classList.add('custom-app');
                div.onclick = () => { openApp(app.file, app.name, app.icon); toggleDexStartMenu(); };

                div.draggable = true;
                div.ondragstart = (e) => {
                    e.dataTransfer.setData('text/plain', JSON.stringify({ id, name: app.name, file: app.file, icon: app.icon }));
                };
                addMobileDragToDesktop(div, { id, name: app.name, file: app.file, icon: app.icon });

                let iconHtml = renderSvgIcon('android');
                if (app.icon) {
                    const isBase64 = app.icon.startsWith('data:');
                    const iconSrc = isBase64 ? app.icon : `icons/${app.icon}`;
                    iconHtml = `<img src="${iconSrc}" onerror="this.outerHTML=renderSvgIcon('android')">`;
                } else if (app.file.startsWith('http')) {
                    iconHtml = renderSvgIcon('link');
                }

                div.innerHTML = `${iconHtml}<span></span>`;
                div.querySelector('span').textContent = app.name;
                container.appendChild(div);
            });

            // Keep the "Novo Site" button visible if we are in Webs or Tudo during search
            if (category === 'webs' || category === 'tudo') {
                const addBtn = document.createElement('div');
                addBtn.className = 'dex-start-app';
                addBtn.innerHTML = `${renderSvgIcon('plus')}<span>Novo Site</span>`;
                addBtn.onclick = openAddWebModal;
                container.appendChild(addBtn);
            }
        }

        // ---- Desktop Icons Logic ----
        function renderDexDesktop() {
            const desktop = document.getElementById('dex-desktop');
            if (!desktop) return;
            desktop.innerHTML = '';

            const savedIcons = safeJSONParse('goldenos_dex_desktop');
            const info = getDexGridInfo();

            // --- Add Recycle Bin first (Permanent) ---
            const trash = document.createElement('div');
            trash.className = 'dex-desktop-icon trash-bin';
            trash.id = 'dex-trash-bin';
            const trashIcon = TRASH_ICON_BASE64 || "icons/Trash.png";
            trash.innerHTML = `<img src="${trashIcon}" draggable="false" onerror="this.outerHTML=renderSvgIcon('trash')"><span>Lixeira</span>`;

            // Align trash bin to the bottom-right grid cell
            const { x: trashX, y: trashY } = getDexTrashCoords();
            trash.style.left = trashX + 'px';
            trash.style.top = trashY + 'px';

            // Smart Trash Visibility
            const isSmartTrash = localStorage.getItem('goldenos_smart_trash') === 'true';
            if (isSmartTrash) {
                trash.style.opacity = '0';
                trash.style.pointerEvents = 'none';
            } else {
                trash.style.opacity = '1';
                trash.style.pointerEvents = 'auto';
            }

            desktop.appendChild(trash);

            // Position and handle desktop icons
            savedIcons.forEach((iconData, index) => {
                const div = document.createElement('div');
                div.className = 'dex-desktop-icon';
                div.dataset.index = index;

                // Boundary check
                const maxX = window.innerWidth - info.w - info.m;
                const maxY = window.innerHeight - 50 - info.h - info.m;

                if (iconData.x !== undefined && iconData.y !== undefined) {
                    let { c, r } = info.getIndices(iconData.x, iconData.y);

                    // Skip Trash Slot
                    if (c === info.cols - 1 && r === info.rows - 1) r = Math.max(0, info.rows - 2);

                    const coords = info.getCoords(c, r);
                    div.style.left = coords.x + 'px';
                    div.style.top = coords.y + 'px';
                } else {
                    // Default grid placement
                    let c = index % info.cols;
                    let r = Math.floor(index / info.cols);

                    // Skip Trash Slot
                    if (c === info.cols - 1 && r >= info.rows - 1) {
                        r = Math.max(0, info.rows - 2);
                    }

                    const coords = info.getCoords(c, Math.min(r, info.rows - 1));
                    div.style.left = coords.x + 'px';
                    div.style.top = coords.y + 'px';
                }

                div.onclick = () => {
                    // Only block if the drag ended less than 200ms ago
                    const lastDragEnd = div._lastDragEnd || 0;
                    if (Date.now() - lastDragEnd < 200) return;
                    openApp(iconData.file, iconData.name, iconData.icon);
                };

                let iconHtml = renderSvgIcon('android');
                if (iconData.icon) {
                    const isBase64 = iconData.icon.startsWith('data:');
                    const iconSrc = isBase64 ? iconData.icon : `icons/${iconData.icon}`;
                    iconHtml = `<img src="${iconSrc}" draggable="false" oncontextmenu="return false;" onerror="this.outerHTML=renderSvgIcon('android')">`;
                } else if (iconData.file.startsWith('http')) {
                    iconHtml = renderSvgIcon('link');
                }

                div.innerHTML = `${iconHtml}<span></span>`;
                div.querySelector('span').textContent = iconData.name;

                makeDexIconDraggable(div, index);
                desktop.appendChild(div);
            });

            // Prevent context menu on desktop
            desktop.oncontextmenu = (e) => {
                if (e.target === desktop) e.preventDefault();
            };

            // Restore support for dropping new icons from Start Menu
            desktop.ondragover = (e) => e.preventDefault();
            desktop.ondrop = (e) => {
                e.preventDefault();
                try {
                    const data = JSON.parse(e.dataTransfer.getData('text/plain'));
                    const current = safeJSONParse('goldenos_dex_desktop');
                    if (!current.find(i => i.file === data.file)) {
                        const rect = desktop.getBoundingClientRect();
                        const info = getDexGridInfo();
                        
                        let { c, r } = info.getIndices(e.clientX - rect.left - info.w/2, e.clientY - rect.top - info.h/2);

                        // Skip Trash Slot
                        if (c === info.cols - 1 && r === info.rows - 1) r = Math.max(0, info.rows - 2);

                        const coords = info.getCoords(c, r);
                        data.x = coords.x;
                        data.y = coords.y;

                        current.push(data);
                        localStorage.setItem('goldenos_dex_desktop', JSON.stringify(current));
                        renderDexDesktop();
                        showToast('Adicionado à área de trabalho', 'success');
                    }
                } catch (err) { }
            };
        }

        function makeDexIconDraggable(el, index) {
            let startX, startY, initialX, initialY;
            let isDragging = false;
            let holdTimer = null;
            const trashBin = document.getElementById('dex-trash-bin');

            const onStart = (e) => {
                // Initial state
                isDragging = false;
                const isTouch = e.type === 'touchstart';
                
                const clientX = isTouch ? e.touches[0].clientX : e.clientX;
                const clientY = isTouch ? e.touches[0].clientY : e.clientY;

                startX = clientX;
                startY = clientY;
                initialX = el.offsetLeft;
                initialY = el.offsetTop;

                // For touch, use a timer to prevent accidental drags
                if (isTouch) {
                    holdTimer = setTimeout(() => {
                        isDragging = true;
                        el.classList.add('dragging');
                        // Show trash bin if smart trash is on
                        const isSmartTrash = localStorage.getItem('goldenos_smart_trash') === 'true';
                        if (isSmartTrash && trashBin) {
                            trashBin.style.opacity = '1';
                            trashBin.style.pointerEvents = 'auto';
                        }
                    }, 300);
                }

                document.addEventListener('mousemove', onMove);
                document.addEventListener('mouseup', onEnd);
                document.addEventListener('touchmove', onMove, { passive: false });
                document.addEventListener('touchend', onEnd);
            };

            const onMove = (e) => {
                const clientX = e.type === 'touchmove' ? e.touches[0].clientX : e.clientX;
                const clientY = e.type === 'touchmove' ? e.touches[0].clientY : e.clientY;

                const dx = clientX - startX;
                const dy = clientY - startY;

                // Threshold check (20px for mobile/hold, 5px for mouse)
                const threshold = (e.type === 'touchmove') ? 20 : 5;

                if (!isDragging && (Math.abs(dx) > threshold || Math.abs(dy) > threshold)) {
                    clearTimeout(holdTimer);
                    isDragging = true;
                    el.classList.add('dragging');
                    
                    const isSmartTrash = localStorage.getItem('goldenos_smart_trash') === 'true';
                    if (isSmartTrash && trashBin) {
                        trashBin.style.opacity = '1';
                        trashBin.style.pointerEvents = 'auto';
                    }
                }

                if (!isDragging) return;

                // If dragging, prevent scrolling
                if (e.cancelable) e.preventDefault();

                el.style.left = (initialX + dx) + 'px';
                el.style.top = (initialY + dy) + 'px';

                // Check trash collision
                if (trashBin) {
                    const rect = trashBin.getBoundingClientRect();
                    if (clientX > rect.left && clientX < rect.right && clientY > rect.top && clientY < rect.bottom) {
                        trashBin.classList.add('drag-over');
                    } else {
                        trashBin.classList.remove('drag-over');
                    }
                }
            };

            const onEnd = (e) => {
                clearTimeout(holdTimer);
                isDragging = false;
                el.classList.remove('dragging');
                document.removeEventListener('mousemove', onMove);
                document.removeEventListener('mouseup', onEnd);
                document.removeEventListener('touchmove', onMove);
                document.removeEventListener('touchend', onEnd);

                const clientX = e.type === 'touchend' ? e.changedTouches[0].clientX : (e.clientX || startX);
                const clientY = e.type === 'touchend' ? e.changedTouches[0].clientY : (e.clientY || startY);

                // Helper to hide smart trash at the very end
                const finalizeSmartTrash = () => {
                    const isSmartTrash = localStorage.getItem('goldenos_smart_trash') === 'true';
                    if (isSmartTrash && trashBin) {
                        trashBin.style.opacity = '0';
                        trashBin.style.pointerEvents = 'none';
                        trashBin.classList.remove('drag-over');
                    }
                };

                // Track drag end time for click prevention
                if (Math.abs(clientX - startX) > 5 || Math.abs(clientY - startY) > 5) {
                    el._lastDragEnd = Date.now();
                }

                // Recycle Bin logic
                if (trashBin && trashBin.classList.contains('drag-over')) {
                    trashBin.classList.remove('drag-over');
                    const current = safeJSONParse('goldenos_dex_desktop');
                    current.splice(index, 1);
                    localStorage.setItem('goldenos_dex_desktop', JSON.stringify(current));
                    finalizeSmartTrash();
                    renderDexDesktop();
                    showToast('Removido para a Lixeira', 'info');
                    return;
                }

                // Snap to Grid (using index-based logic)
                const info = getDexGridInfo();
                let { c, r } = info.getIndices(el.offsetLeft, el.offsetTop);

                // Recycle Bin check: prevent snap over trash
                if (c === info.cols - 1 && r === info.rows - 1) {
                    r = Math.max(0, info.rows - 2);
                }

                const coords = info.getCoords(c, r);
                el.style.left = coords.x + 'px';
                el.style.top = coords.y + 'px';

                // Save Position
                const current = safeJSONParse('goldenos_dex_desktop');
                if (current[index]) {
                    current[index].x = coords.x;
                    current[index].y = coords.y;
                    localStorage.setItem('goldenos_dex_desktop', JSON.stringify(current));
                }
                finalizeSmartTrash();
            };

            el.addEventListener('mousedown', onStart);
            el.addEventListener('touchstart', onStart, { passive: false });
        }

        const ICON_MAP = {
            'cog': 'M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.06-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.73,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.8,11.69,4.8,12s0.02,0.64,0.06,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.43-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.49-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z',
            'clock': 'M256 0c141.4 0 256 114.6 256 256s-114.6 256-256 256S0 397.4 0 256S114.6 0 256 0zM232 120V256c0 8 4.5 15.5 11.5 19l112 64c10.9 6.2 24.7 2.4 30.9-8.5s2.4-24.7-8.5-30.9L280 243.9V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z',
            'calendar': 'M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z',
            'server': 'M64 32C28.7 32 0 60.7 0 96v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM96 96H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zM64 288c-35.3 0-64 28.7-64 64v64c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V352c0-35.3-28.7-64-64-64H64zM416 352h32v64h-32V352z',
            'music': 'M499.1 6.3c8.1 4.6 12.9 13.3 12.9 22.7V352c0 61.9-50.1 112-112 112s-112-50.1-112-112s50.1-112 112-112c11.3 0 22.3 1.7 32 4.8V96L192 128V416c0 53-43 96-96 96s-96-43-96-96s43-96 96-96c11.3 0 22.3 1.7 32 4.8V32c0-10.3 6.2-19.6 15.6-23.4s20-1.5 27.2 5.8L499.1 6.3z',
            'folder-open': 'M528 224H117c-11.6 0-22.3 6.3-28.3 16.5L.2 375.8C-2.1 379.7 0.2 384 4.7 384h540.6c4.5 0 6.8-4.3 4.5-8.2L461.3 223.8c-6-10.2-16.7-16.5-28.3-16.5H480V160c0-26.5-21.5-48-48-48H224l-48-48H48C21.5 64 0 85.5 0 112v208h64V160c0-8.8 7.2-16 16-16h87.5l48 48H432c8.8 0 16 7.2 16 16v64z',
            'backward': 'M11.5 280.6l192 160c20.6 17.2 52.5 2.8 52.5-24.6V333.9l192 160c20.6 17.2 52.5 2.8 52.5-24.6V42.1c0-27.4-31.9-41.8-52.5-24.6l-192 160V113.1c0-27.4-31.9-41.8-52.5-24.6l-192 160c-15.3 12.8-15.3 36.4 0 49.1z',
            'play': 'M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z',
            'pause': 'M144 479H48c-26.5 0-48-21.5-48-48V79c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zm320 0h-96c-26.5 0-48-21.5-48-48V79c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48z',
            'forward': 'M11.5 280.6l192 160c20.6 17.2 52.5 2.8 52.5-24.6V333.9l192 160c20.6 17.2 52.5 2.8 52.5-24.6V42.1c0-27.4-31.9-41.8-52.5-24.6l-192 160V113.1c0-27.4-31.9-41.8-52.5-24.6l-192 160c-15.3 12.8-15.3 36.4 0 49.1z',
            'list': 'M0 96C0 78.3 14.3 64 32 64H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z',
            'th': 'M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm96 64H224V256H96V160zm0 160H224v96H96V320zm160 0H384v96H256V320zm160-160H256V256H384V160z',
            'globe': 'M0 256c0 141.4 114.6 256 256 256s256-114.6 256-256S397.4 0 256 0 0 114.6 0 256zm256 160c-24.5 0-48-5.3-69.2-14.8C200.2 376.6 216 348.1 216 316c0-44.2-35.8-80-80-80-14.3 0-27.7 3.8-39.2 10.3C91.4 210.5 88 174.6 88 136c0-26 1.7-51.6 5-76.6C131.7 41.6 189.9 24 256 24c134.4 0 243.6 103.4 254.9 234.3C505.5 259.8 496 264 496 264c-22.1 0-40-17.9-40-40 0-44.2-35.8-80-80-80-26 0-49 12.4-63.5 31.6-1.5 1.9-2.9 3.9-4.1 6-13.3 22.8-12.4 51 3.1 72.8 11.2 15.8 11.2 36.6 0 52.4-11.5 16.3-29.6 25.1-48.9 24.3-17.5-.7-32.9-12.2-38.6-28.7-2.6-7.7-2.6-16.1 0-23.8 5.7-16.5 21.1-28 38.6-28.7 13-.5 25.1 5.4 33.1 15.1 3.5 4.3 8.7 6.9 14.2 6.9 10.4 0 18.8-8.4 18.8-18.8 0-4.6-1.7-9.1-4.7-12.6C309.2 122 284 104 256 104c-44.2 0-80 35.8-80 80 0 26 12.4 49 31.6 63.5 1.9 1.5 3.9 2.9 6 4.1 22.8 13.3 51 12.4 72.8-3.1 15.8-11.2 36.6-11.2 52.4 0 16.3 11.5 25.1 29.6 24.3 48.9-.7 17.5-12.2 32.9-28.7 38.6-7.7 2.6-16.1 2.6-23.8 0-16.5-5.7-28-21.1-28.7-38.6-.5-13 5.4-25.1 15.1-33.1 4.3-3.5 6.9-8.7 6.9-14.2 0-10.4-8.4-18.8-18.8-18.8-4.6 0-9.1 1.7-12.6 4.7C218 202.8 200 228 200 256c0 44.2 35.8 80 80 80 13 0 25.1-3.1 35.9-8.6 15 25.6 24.1 55.4 24.1 87.2 0 18.1-2.9 35.5-8.2 51.8-21.3 26.2-52 43.6-86.8 48.3-2.6.4-5.2.7-7.9.9C215.1 513.7 188.7 512 160 512 71.6 512 0 440.4 0 352c0-11.9 1.3-23.5 3.8-34.7C16.9 270.3 58.7 229.4 110.1 209.6c4-1.5 8.1-2.6 12.3-3.2 26.5-3.8 52.2 7.7 66.8 29.7 11.2 16.9 11.2 38.8 0 55.7-9.5 14.4-25 22.3-41.5 22.3-5.2 0-10.4-.8-15.4-2.4C117 307.2 104 286.3 104 264c0-4.4.4-8.7 1.2-13-16.3 4.2-30.8 13.9-40.6 27.2-2.5 3.4-4.7 7-6.5 10.8C54 297.8 52 306.8 52 316c0 30.9 25.1 56 56 56 12.3 0 23.7-3.9 33.1-10.6C153.2 385 174.5 400 200 400c44.2 0 80-35.8 80-80 0-13-3.1-25.1-8.6-35.9 25.6-15 55.4-24.1 87.2-24.1 18.1 0 35.5 2.9 51.8 8.2-12 11.6-20.9 25.9-25.7 41.8-6.1 20-3.3 41.5 7.8 59.2 12.6 20 12.6 45.4 0 65.4-11.6 18.5-30.4 28.9-50.6 28.5-17.7-.3-33.4-11.2-39.7-27.7-2.9-7.6-3.2-15.9-1-23.7 4.7-16.8 20-29 37.6-30.2 18.1-1.3 34.6 10.6 39.5 28.2 1.2 4.3 4.9 7.4 9.4 7.7 5.2.3 9.7-3.4 10.5-8.6.6-4.2-.4-8.5-2.8-12-11.2-16.1-29.2-26-49.1-26.4-19.1-.4-37 7.5-49.1 21.6-.9 1-1.8 2.1-2.6 3.2-11.2 15.8-11.2 36.6 0 52.4 13.3 18.9 34.6 28.6 56.6 25.8 20.8-2.6 37.8-17.4 44.5-37.1.9-2.7 1.6-5.5 2-8.3C402.7 325.2 344 264 272 264c-13.3 0-24 10.7-24 24s10.7 24 24 24c44.2 0 80 35.8 80 80 0 13-3.1 25.1-8.6 35.9-25.6 15-55.4 24.1-87.2 24.1-18.1 0-35.5-2.9-51.8-8.2-11.6 12-25.9 20.9-41.8 25.7-20 6.1-41.5 3.3-59.2-7.8-20-12.6-45.4-12.6-65.4 0-18.5 11.6-28.9 30.4-28.5 50.6.3 17.7 11.2 33.4 27.7 39.7 7.6 2.9 15.9 3.2 23.7 1 16.8-4.7 29-20 30.2-37.6 1.3-18.1-10.6-34.6-28.2-39.5-4.3-1.2-7.4-4.9-7.7-9.4-.3-5.2 3.4-9.7 8.6-10.5 4.2-.6 8.5.4 12 2.8 16.1 11.2 26 29.2 26.4 49.1.4 19.1-7.5 37-21.6 49.1-1 .9-2.1 1.8-3.2 2.6-15.8 11.2-36.6 11.2-52.4 0-18.9-13.3-28.6-34.6-25.8-56.6 2.6-20.8 17.4-37.8 37.1-44.5 2.7-.9 5.5-1.6 8.3-2z',
            'download': 'M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64z',
            'gamepad': 'M0 192C0 147.8 35.8 112 80 112H432c44.2 0 80 35.8 80 80V400c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V192zM128 256c0-13.3-10.7-24-24-24s-24 10.7-24 24v32H48c-13.3 0-24 10.7-24 24s10.7 24 24 24H80v32c0 13.3 10.7 24 24 24s24-10.7 24-24V336h32c13.3 0 24-10.7 24-24s-10.7-24-24-24H128V256zm256 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm64 64a32 32 0 1 0 0-64 32 32 0 1 0 0 64z',
            'external-link-alt': 'M432 320c-13.3 0-24 10.7-24 24v112H64V104h112c13.3 0 24-10.7 24-24s-10.7-24-24-24H48C21.5 56 0 77.5 0 104V464c0 26.5 21.5 48 48 48H408c26.5 0 48-21.5 48-48V344c0-13.3-10.7-24-24-24zm56-320H320c-13.3 0-24 10.7-24 24s10.7 24 24 24h62.1L182 248c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0L416 81.9V144c0 13.3 10.7 24 24 24s24-10.7 24-24V24c0-13.3-10.7-24-24-24z',
            'link': 'M326.6 230.9l-54.6 54.6c-6.2 6.2-16.4 6.2-22.6 0l-10.4-10.4c-6.2-6.2-6.2-16.4 0-22.6l54.6-54.6c6.2-6.2 16.4-6.2 22.6 0l10.4 10.4c6.2 6.2 6.2 16.4 0 22.6zm70.2-70.2l-54.6 54.6c-6.2 6.2-16.4 6.2-22.6 0l-10.4-10.4c-6.2-6.2-6.2-16.4 0-22.6l54.6-54.6c6.2-6.2 16.4-6.2 22.6 0l10.4 10.4c6.2 6.2 6.2 16.4 0 22.6z',
            'android': 'M420.6 301.9c0-12.7-10.3-23-23-23s-23 10.3-23 23c0 12.7 10.3 23 23 23s23-10.3 23-23zm-153.2 0c0-12.7-10.3-23-23-23s-23 10.3-23 23c0 12.7 10.3 23 23 23s23-10.3 23-23zm136.2-109.1c-1.3-1.6-3.3-2.6-5.4-2.6h-212c-2.1 0-4.1 1-5.4 2.6c-1.3 1.6-1.7 3.8-1 5.7s2.5 3.5 4.5 4.2c26.2 8.3 54.2 12.6 82.5 12.6s56.3-4.3 82.5-12.6c2-.7 3.7-2.3 4.5-4.2s.4-4.1-1-5.7z',
            'inbox': 'M576 240c0-23.5-19.1-42.7-42.7-42.7H416l-72.3-115.7c-13.7-21.9-39.5-36.4-68.3-36.4H42.7C19.1 45.3 0 64.5 0 88V424c0 23.5 19.1 42.7 42.7 42.7h490.7c23.5 0 42.7-19.1 42.7-42.7V240zm-320-16h128v128c0 35.3-28.7 64-64 64s-64-28.7-64-64V224z',
            'search': 'M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zm-312 0c0 57.4 46.6 104 104 104s104-46.6 104-104s-46.6-104-104-104s-104 46.6-104 104z',
            'th-large': 'M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM320 288V416h128V288H320zm0-192V224h128V96H320zM64 288V416H192V288H64zM64 96V224H192V96H64z',
            'edit': 'M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.8 74.4 172.4 241.7z',
            'image': 'M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM320 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM448 352l-128-128L256 288l-64-64L64 352v64H448V352z',
            'palette': 'M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM80 256a24 24 0 1 0 48 0 24 24 0 1 0 -48 0zm112-72a24 24 0 1 0 0-48 24 24 0 1 0 0 48zm120 0a24 24 0 1 0 0-48 24 24 0 1 0 0 48zm112 72a24 24 0 1 0 -48 0 24 24 0 1 0 48 0zM256 368c53 0 96-43 96-96c0-17.7-14.3-32-32-32s-32 14.3-32 32c0 17.7-14.3 32-32 32s-32-14.3-32-32c0-53 43-96 96-96c17.7 0 32-14.3 32-32s-14.3-32-32-32c-88.4 0-160 71.6-160 160s71.6 160 160 160z',
            'eye-slash': 'M432 448L84.8 100.8C35.5 141.5 0 207.1 0 256c0 106 86 192 192 192c48.9 0 92.5-18.4 125.1-48.8L432 448zM192 384c-70.7 0-128-57.3-128-128c0-34.8 13.9-66.3 36.4-89.4l26.2 26.2c-10.4 17.7-16.6 38.3-16.6 63.2c0 68.5 55.5 124 124 124c24.9 0 45.5-6.2 63.2-16.6l26.2 26.2c-23.1 22.5-54.6 36.4-89.4 36.4z',
            'exclamation-triangle': 'M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1s-20.1 20.1-34.5 20.1H40c-14.4 0-27.4-7.7-34.5-20.1s-7.1-27.7 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z',
            'magic': 'M4.3 20.7c-5.7-5.7-5.7-15.1 0-20.8s15.1-5.7 20.8 0l112 112c5.7 5.7 5.7 15.1 0 20.8s-15.1 5.7-20.8 0l-112-112zM320 0c17.7 0 32 14.3 32 32V256c0 17.7-14.3 32-32 32s-32-14.3-32-32V32c0-17.7 14.3-32 32-32zM507.7 20.7c5.7-5.7 5.7-15.1 0-20.8s-15.1-5.7-20.8 0l-112 112c-5.7 5.7-5.7 15.1 0 20.8s15.1 5.7 20.8 0l112-112zM0 320c0-17.7 14.3-32 32-32H256c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM480 288c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32s14.3-32 32-32H480zM362.3 362.3c5.7-5.7 15.1-5.7 20.8 0l112 112c5.7 5.7 5.7 15.1 0 20.8s-15.1 5.7-20.8 0l-112-112c-5.7-5.7-5.7-15.1 0-20.8zM149.7 362.3c5.7 5.7 5.7 15.1 0 20.8l-112 112c-5.7 5.7-15.1 5.7-20.8 0s-5.7-15.1 0-20.8l112-112c5.7-5.7 15.1-5.7 20.8 0z',
            'upload': 'M105 204.3c-7.9-7.9-7.9-20.6 0-28.5L241.7 39.1c7.9-7.9 20.6-7.9 28.5 0L406.8 175.7c7.9 7.9 7.9 20.6 0 28.5s-20.6 7.9-28.5 0L241.7 84.8V448c0 11.2-9.1 20.3-20.3 20.3s-20.3-9.1-20.3-20.3V84.8L133.5 204.3c-7.9 7.9-20.6 7.9-28.5 0z',
            'film': 'M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM320 288V416h128V288H320zm0-192V224h128V96H320zM64 288V416H192V288H64zM64 96V224H192V96H64z',
            'dock': 'M48 64C21.5 64 0 85.5 0 112V400c0 26.5 21.5 48 48 48H464c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H48zM448 352v32H64V352H448z',
            'th-list': 'M0 96C0 78.3 14.3 64 32 64H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z',
            'square-minus': 'M0 112C0 85.5 21.5 64 48 64H336c26.5 0 48 21.5 48 48V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112zm448 0v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16h-32v96h32c8.8 0 16 7.2 16 16s-7.2 16-16 16h-32v96h32c8.8 0 16 7.2 16 16s-7.2 16-16 16h-32V400 112zM80 240h224c13.3 0 24 10.7 24 24s-10.7 24-24 24H80c-13.3 0-24-10.7-24-24s10.7-24 24-24z',
            'square': 'M0 112C0 85.5 21.5 64 48 64H400c26.5 0 48 21.5 48 48V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112zM384 128H64V384H384V128z',
            'times': 'M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7L86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256L41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3l105.4 105.3c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256l105.3-105.4z',
            'plus': 'M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z',
            'chevron-left': 'M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z',
            'chevron-right': 'M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z',
            'minus': 'M0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32z',
            'desktop': 'M384 128h-128V0L384 128zM256 160H384v304c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V160c0-26.5 21.5-48 48-48h208v48z',
            'redo': 'M480 256c0 123.4-100.5 223.9-223.9 223.9C132.6 479.9 32 379.4 32 256s100.6-223.9 224.1-223.9c47.1 0 91.6 14.1 129.5 39.9L326 131.6c-7.9 7.9-2.3 21.4 8.8 21.4H480c8.8 0 16-7.2 16-16V30.5c0-11.1-13.5-16.7-21.4-8.8l-59.6 59.6C368.5 42 314 16 256.1 16C123.6 16 16 123.7 16 256s107.6 240 240.1 240s239.9-107.5 239.9-240H480z',
            'trash': 'M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64s14.3-32 32-32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z',
            'check': 'M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z',
            'info-circle': 'M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V192H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24V336h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z',
            'edit': 'M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0z'
        };

        function renderSvgIcon(name, extraClass = '') {
            const aliases = {
                'calendar-alt': 'calendar',
                'th-large': 'th-large',
                'magnifying-glass': 'search',
                'table-cells': 'th',
                'wand-magic': 'magic',
                'triangle-exclamation': 'exclamation-triangle',
                'up-right-from-square': 'external-link-alt',
                'box': 'inbox',
                'gear': 'cog',
                'minus': 'minus',
                'square-o': 'square',
                'times': 'times',
                'plus': 'plus',
                'desktop': 'dock'
            };

            let cleanName = name.replace(/fa-|fas |far |fab |fa-solid |fa-brands /g, '').trim();
            if (aliases[cleanName]) cleanName = aliases[cleanName];

            const path = ICON_MAP[cleanName];
            if (!path) return `<!-- Icon ${cleanName} not found -->`;

            const specialVb = {
                'eye-slash': '0 0 512 512',
                'cog': '0 0 24 24',
                'play': '0 0 448 512',
                'pause': '0 0 448 512',
                'folder-open': '0 0 576 512',
                'backward': '0 0 512 512',
                'forward': '0 0 512 512',
                'android': '0 0 576 512',
                'inbox': '0 0 576 512',
                'minus': '0 0 448 512',
                'plus': '0 0 448 512',
                'trash': '0 0 448 512',
                'redo': '0 0 512 512'
            };

            const viewBox = specialVb[cleanName] || '0 0 512 512';
            return `<svg class='svg-icon icon-${cleanName} ${extraClass}' viewBox='${viewBox}' fill='currentColor'><path d='${path}'/></svg>`;
        }

        // ---- Notification System ----
        function showToast(message, type = 'info') {
            const container = document.getElementById('toast-container');
            if (!container) return;

            const toast = document.createElement('div');
            toast.className = `toast toast-${type}`;

            let icon = 'info-circle';
            if (type === 'success') icon = 'check';
            if (type === 'error') icon = 'exclamation-triangle';

            toast.innerHTML = `
                <div class="toast-icon">${renderSvgIcon(icon)}</div>
                <div class="toast-msg">${message}</div>
            `;

            container.appendChild(toast);

            // Auto-hide
            setTimeout(() => {
                toast.classList.add('hiding');
                setTimeout(() => toast.remove(), 300);
            }, 4000);
        }

        let _confirmCallback = null;
        function showConfirm(title, message, onConfirm) {
            document.getElementById('confirm-title').innerText = title;
            document.getElementById('confirm-message').innerText = message;
            _confirmCallback = onConfirm;
            openModal('confirm-modal');
        }

        function handleConfirmAction(confirmed) {
            closeModal('confirm-modal');
            if (confirmed && _confirmCallback) {
                _confirmCallback();
            }
            _confirmCallback = null;
        }

        // ---- Window Manager ----
        function openApp(file, name = 'App', icon = '') {
            if (!file) return; // Defensive check
            let url = (typeof file === 'string' && (file.startsWith('http') || file.startsWith('data:') || file.startsWith('blob:'))) ? file : 'apps/' + file;

            // Check if it's a local code snippet
            if (typeof file === 'string' && file.startsWith('snippet:')) {
                try {
                    const code = decodeURIComponent(file.replace('snippet:', ''));
                    const blob = new Blob([code], { type: 'text/html' });
                    url = URL.createObjectURL(blob);
                } catch (e) {
                    console.error('Erro ao decodificar snippet:', e);
                    // Fallback: try using the raw data if decode failed (might be already decoded)
                    const rawCode = file.replace('snippet:', '');
                    const blob = new Blob([rawCode], { type: 'text/html' });
                    url = URL.createObjectURL(blob);
                }
            }

            if (!isDexMode) {
                // Redirect directly even for local content (snippets, data, blobs) as requested
                window.location.href = url;
                return;
            }

            // Check if already open
            const winId = 'dex-win-' + btoa(file).replace(/[^a-zA-Z0-9]/g, '');
            if (document.getElementById(winId)) {
                restoreDexWindow(winId);
                return;
            }

            const container = document.getElementById('dex-windows-container');
            if (!container) return;

            const win = document.createElement('div');
            win.className = 'dex-window';
            win.id = winId;
            win.style.zIndex = ++dexZIndexCounter;

            let iconHtml = renderSvgIcon('android');
            if (icon) {
                const isBase64 = icon.startsWith('data:');
                const iconSrc = isBase64 ? icon : `icons/${icon}`;
                iconHtml = `<img src="${iconSrc}" onerror="this.outerHTML=renderSvgIcon('android')">`;
            } else if (file.startsWith('http')) {
                iconHtml = renderSvgIcon('link');
            }

            win.innerHTML = `
                <div class="dex-window-header" onmousedown="focusDexWindow('${winId}')">
                    <div class="dex-window-title">${iconHtml}<span></span></div>
                    <div class="dex-window-controls">
                        <button class="dex-win-btn close" onclick="closeDexWindow('${winId}')">${renderSvgIcon('times')}</button>
                        <button class="dex-win-btn btn-maximize" onclick="maximizeDexWindow('${winId}')">${renderSvgIcon('square-o')}</button>
                        <button class="dex-win-btn btn-minimize" onclick="minimizeDexWindow('${winId}')">${renderSvgIcon('minus')}</button>
                        <button class="dex-win-btn btn-split-right" onclick="splitDexWindow('${winId}', 'right')">${renderSvgIcon('chevron-right')}</button>
                        <button class="dex-win-btn btn-split-left" onclick="splitDexWindow('${winId}', 'left')">${renderSvgIcon('chevron-left')}</button>
                        <button class="dex-win-btn btn-reload" onclick="reloadDexWindow('${winId}')">${renderSvgIcon('redo')}</button>
                        <button class="dex-win-btn btn-fullscreen" onclick="openDexAppFullscreen('${url}')" title="Tela Cheia">${renderSvgIcon('up-right-from-square')}</button>
                    </div>
                </div>
                <div class="dex-window-content">
                    <div class="dex-window-overlay"></div>
                    <iframe src="${url}"></iframe>
                    <div class="dex-window-resize-handle"></div>
                </div>
            `;
            win.querySelector('.dex-window-title span').textContent = name;
            container.appendChild(win);

            requestAnimationFrame(() => {
                if (window.innerWidth <= 768) {
                    // Mobile: center and ensure top is visible
                    win.style.left = '2.5vw';
                    win.style.top = '50px';
                } else {
                    // PC: random position
                    win.style.top = Math.max(50, Math.random() * 80) + 'px';
                    win.style.left = Math.max(50, Math.random() * 150) + 'px';
                }
                // Store natural height after it's rendered
                win.dataset.naturalHeight = win.offsetHeight;
            });

            openDexWindows.push({ id: winId, name, icon });
            renderDexTaskbar();
            makeDexWindowDraggable(win);
            makeDexWindowResizable(win);

            // Fix: Focus the iframe immediately when window is created
            setTimeout(() => {
                const iframe = win.querySelector('iframe');
                if (iframe) iframe.focus();
            }, 100);
        }

        function renderDexTaskbar() {
            const tb = document.getElementById('dex-taskbar-apps');
            if (!tb) return;
            tb.innerHTML = '';
            openDexWindows.forEach(w => {
                const item = document.createElement('div');
                item.className = 'dex-taskbar-item active';
                item.setAttribute('tabindex', '0');
                item.onclick = () => restoreDexWindow(w.id);

                let iconHtml = renderSvgIcon('android');
                if (w.icon) {
                    const isBase64 = w.icon.startsWith('data:');
                    const iconSrc = isBase64 ? w.icon : `icons/${w.icon}`;
                    iconHtml = `<img src="${iconSrc}" onerror="this.outerHTML=renderSvgIcon('android')">`;
                }

                item.innerHTML = `${iconHtml}<span></span>`;
                item.querySelector('span').textContent = w.name;
                tb.appendChild(item);
            });
        }

        function renderDexFavorites() {
            const container = document.getElementById('dex-taskbar-favorites');
            if (!container) return;
            container.innerHTML = '';

            const dockConfig = safeJSONParse('goldenos_dock');
            dockConfig.slice(0, 3).forEach(appId => {
                if (!allApps[appId]) return;
                const app = allApps[appId];

                const item = document.createElement('div');
                item.className = 'dex-fav-item';
                item.setAttribute('tabindex', '0');
                item.title = app.name;
                item.onclick = () => openApp(app.file, app.name, app.icon);

                let iconHtml = renderSvgIcon('android');
                if (app.icon && app.icon.trim()) {
                    const isBase64 = app.icon.startsWith('data:');
                    const iconSrc = isBase64 ? app.icon : `icons/${app.icon}`;
                    iconHtml = `<img src="${iconSrc}" onerror="this.outerHTML=renderSvgIcon('android')">`;
                } else if (app.file.startsWith('http')) {
                    iconHtml = renderSvgIcon('link');
                }

                item.innerHTML = iconHtml;
                container.appendChild(item);
            });
        }

        function focusDexWindow(id) {
            const win = document.getElementById(id);
            if (win) {
                win.style.zIndex = ++dexZIndexCounter;
                // Fix: Automatically focus any iframe inside the window for games/apps
                const iframe = win.querySelector('iframe');
                if (iframe) {
                    try {
                        iframe.focus();
                    } catch (e) { }
                }
            }
        }

        function openDexAppFullscreen(url) {
            window.location.href = url;
        }

        function minimizeDexWindow(id) {
            const win = document.getElementById(id);
            if (win) {
                win.classList.add('minimized');
                win.classList.remove('maximized');
            }
        }

        function maximizeDexWindow(id) {
            const win = document.getElementById(id);
            if (win) {
                if (win.classList.contains('maximized')) {
                    win.classList.remove('maximized');
                } else {
                    win.classList.add('maximized');
                    win.classList.remove('minimized');
                }
                focusDexWindow(id);
            }
        }

        function closeDexWindow(id) {
            const win = document.getElementById(id);
            if (win) win.remove();
            openDexWindows = openDexWindows.filter(w => w.id !== id);
            renderDexTaskbar();
        }

        function reloadDexWindow(id) {
            const win = document.getElementById(id);
            if (win) {
                const iframe = win.querySelector('iframe');
                if (iframe) {
                    // Fast way to reload an iframe without clearing cache
                    iframe.src = iframe.src;
                }
            }
        }

        function restoreDexWindow(id) {
            const win = document.getElementById(id);
            if (win) {
                win.classList.remove('minimized');
                focusDexWindow(id);
            }
        }

        function splitDexWindow(id, side) {
            const win = document.getElementById(id);
            if (!win) return;
            win.classList.remove('maximized', 'minimized');
            win.style.top = '0';
            win.style.height = 'calc(100vh - 56px)'; // fills to taskbar (50px) with 6px gap
            win.dataset.naturalHeight = win.offsetHeight;
            win.style.width = '50%';
            if (side === 'left') {
                win.style.left = '0';
            } else {
                win.style.left = '50%';
            }
            focusDexWindow(id);
        }

        let dexActiveDragWin = null;
        let dexActiveResizeWin = null;
        let dexDragStartX, dexDragStartY, dexDragStartLeft, dexDragStartTop, dexDragStartHeight;
        let dexResizeStartX, dexResizeStartY, dexResizeStartWidth, dexResizeStartHeight;
        let dexIsAutoResizing = false;

        function makeDexWindowDraggable(win) {
            const header = win.querySelector('.dex-window-header');
            header.addEventListener('mousedown', (e) => startDexDrag(e, win));
            header.addEventListener('touchstart', (e) => startDexDrag(e, win), { passive: true });
        }

        function startDexDrag(e, win) {
            if (e.target.closest('.dex-window-controls')) return;
            focusDexWindow(win.id);
            dexActiveDragWin = win;
            win.classList.add('dragging', 'no-transition');
            const clientX = e.type.includes('mouse') ? e.clientX : e.touches[0].clientX;
            const clientY = e.type.includes('mouse') ? e.clientY : e.touches[0].clientY;
            dexDragStartX = clientX;
            dexDragStartY = clientY;
            dexDragStartLeft = win.offsetLeft;
            dexDragStartTop = win.offsetTop;
            // Use stored natural height if available to avoid capturing "squished" state
            dexDragStartHeight = win.dataset.naturalHeight ? parseFloat(win.dataset.naturalHeight) : win.offsetHeight;
            dexIsAutoResizing = false;
        }

        function makeDexWindowResizable(win) {
            const handle = win.querySelector('.dex-window-resize-handle');
            handle.addEventListener('mousedown', (e) => startDexResize(e, win));
            handle.addEventListener('touchstart', (e) => startDexResize(e, win), { passive: true });
        }

        function startDexResize(e, win) {
            focusDexWindow(win.id);
            dexActiveResizeWin = win;
            document.body.classList.add('resizing');
            win.classList.add('no-transition', 'dragging');
            const clientX = e.type.includes('mouse') ? e.clientX : e.touches[0].clientX;
            const clientY = e.type.includes('mouse') ? e.clientY : e.touches[0].clientY;
            dexResizeStartX = clientX;
            dexResizeStartY = clientY;
            dexResizeStartWidth = win.offsetWidth;
            dexResizeStartHeight = win.offsetHeight;
            if (e.type.includes('mouse')) e.preventDefault();
            e.stopPropagation();
        }

        document.addEventListener('mousemove', handleDexMove);
        document.addEventListener('touchmove', handleDexMove, { passive: false });
        document.addEventListener('mouseup', endDexInteraction);
        document.addEventListener('touchend', endDexInteraction);

        function handleDexMove(e) {
            if (dexActiveDragWin) {
                const clientX = e.type.includes('mouse') ? e.clientX : e.touches[0].clientX;
                const clientY = e.type.includes('mouse') ? e.clientY : e.touches[0].clientY;
                const dx = clientX - dexDragStartX;
                const dy = clientY - dexDragStartY;
                const top = dexDragStartTop + dy;
                const left = dexDragStartLeft + dx;

                // Clamping for Dex Mode: Prevent header from going under the taskbar
                const bottomMargin = isDexMode ? 50 : 0;
                const maxX = window.innerWidth - 100; // Allow partial off-screen
                const maxY = window.innerHeight - bottomMargin - 40; // 40px is header height

                // Final position with clamping
                const finalTop = Math.max(0, Math.min(top, maxY));
                const finalLeft = Math.max(-dexActiveDragWin.offsetWidth + 100, Math.min(left, maxX));

                dexActiveDragWin.style.left = `${finalLeft}px`;
                dexActiveDragWin.style.top = `${finalTop}px`;

                // Auto-Resize on Drag: Shrink window if it hits the dock
                if (isDexMode) {
                    const savedRes = localStorage.getItem('goldenos_smart_resize');
                    const resizeEnabled = savedRes === null ? true : (savedRes === 'true');

                    if (resizeEnabled) {
                        const currentHeight = dexActiveDragWin.offsetHeight;
                        const availableHeight = window.innerHeight - bottomMargin - finalTop;

                        // Trigger auto-minimize if window is squished too much (below 60px available height)
                        const savedSmart = localStorage.getItem('goldenos_smart_minimize');
                        const smartEnabled = savedSmart === null ? true : (savedSmart === 'true');

                        if (smartEnabled && availableHeight < 60) {
                            const winId = dexActiveDragWin.id;
                            const winName = dexActiveDragWin.querySelector('.dex-window-title span')?.innerText || 'Aplicativo';

                            // Restore original height BEFORE minimizing so it's not "trapped" when reopened
                            dexActiveDragWin.style.height = dexDragStartHeight + 'px';

                            minimizeDexWindow(winId);
                            showToast(`${winName} minimizado automaticamente`, 'info');
                            endDexInteraction();
                            return;
                        }

                        if (finalTop + currentHeight > window.innerHeight - bottomMargin || dexIsAutoResizing) {
                            const targetHeight = Math.max(150, Math.min(dexDragStartHeight, availableHeight));
                            dexActiveDragWin.style.height = targetHeight + 'px';
                            dexIsAutoResizing = (targetHeight < dexDragStartHeight);
                        }
                    }
                }

                // Snap logic and indicators
                const savedEdges = localStorage.getItem('goldenos_smart_edges');
                const edgesEnabled = savedEdges === null ? true : (savedEdges === 'true');

                if (edgesEnabled) {
                    // Snap preview — sides: 1/4 window outside; top: header reaches y<20
                    const winLeft = dexDragStartLeft + dx;
                    const winTop = dexDragStartTop + dy;
                    const winRight = winLeft + dexActiveDragWin.offsetWidth;
                    const snapWidth = dexActiveDragWin.offsetWidth / 4; // 1/4 outside = snap

                    // Side snap indicator (half-screen gold)
                    let snapIndicator = document.getElementById('dex-snap-indicator');
                    if (!snapIndicator) {
                        snapIndicator = document.createElement('div');
                        snapIndicator.id = 'dex-snap-indicator';
                        snapIndicator.style.cssText = 'position:fixed;top:0;height:calc(100vh - 50px);width:50%;background:var(--gold-glow);border:2px solid var(--gold);opacity:0.6;pointer-events:none;z-index:99999;transition:opacity 0.15s;display:none;box-sizing:border-box;';
                        document.body.appendChild(snapIndicator);
                    }

                    // Top maximize indicator (full-screen gold bar)
                    let snapTopIndicator = document.getElementById('dex-snap-top-indicator');
                    if (!snapTopIndicator) {
                        snapTopIndicator = document.createElement('div');
                        snapTopIndicator.id = 'dex-snap-top-indicator';
                        snapTopIndicator.style.cssText = 'position:fixed;top:0;left:0;height:calc(100vh - 50px);width:100%;background:var(--gold-glow);border:2px solid var(--gold);opacity:0.5;pointer-events:none;z-index:99999;display:none;box-sizing:border-box;';
                        document.body.appendChild(snapTopIndicator);
                    }

                    if (winTop < 20) {
                        snapTopIndicator.style.display = 'block';
                        snapIndicator.style.display = 'none';
                    } else if (winLeft < -snapWidth) {
                        snapTopIndicator.style.display = 'none';
                        snapIndicator.style.left = '0';
                        snapIndicator.style.display = 'block';
                    } else if (winRight > window.innerWidth + snapWidth) {
                        snapTopIndicator.style.display = 'none';
                        snapIndicator.style.left = '50%';
                        snapIndicator.style.display = 'block';
                    } else {
                        snapTopIndicator.style.display = 'none';
                        snapIndicator.style.display = 'none';
                    }
                }

                if (e.type === 'touchmove') e.preventDefault();
            } else if (dexActiveResizeWin) {
                const clientX = e.type.includes('mouse') ? e.clientX : e.touches[0].clientX;
                const clientY = e.type.includes('mouse') ? e.clientY : e.touches[0].clientY;
                const width = dexResizeStartWidth + (clientX - dexResizeStartX);
                const height = dexResizeStartHeight + (clientY - dexResizeStartY);

                // Constraints: Prevent resizing under the taskbar
                const savedRes = localStorage.getItem('goldenos_smart_resize');
                const resizeEnabled = savedRes === null ? true : (savedRes === 'true');

                let finalHeight = height;
                if (resizeEnabled) {
                    const currentTop = parseFloat(dexActiveResizeWin.style.top) || 0;
                    const bottomMargin = isDexMode ? 50 : 0;
                    const maxHeight = window.innerHeight - currentTop - bottomMargin;
                    finalHeight = Math.min(height, maxHeight);
                }

                dexActiveResizeWin.style.width = Math.max(300, width) + 'px';
                dexActiveResizeWin.style.height = Math.max(150, finalHeight) + 'px';

                // Update natural height when manually resized
                dexActiveResizeWin.dataset.naturalHeight = dexActiveResizeWin.offsetHeight;

                if (e.type === 'touchmove') e.preventDefault();
            }
        }

        function endDexInteraction() {
            if (dexActiveDragWin) {
                // Check snaps: 1/4 outside side = split; top < 20 = maximize
                const winLeft = parseFloat(dexActiveDragWin.style.left) || 0;
                const winTop = parseFloat(dexActiveDragWin.style.top) || 0;
                const winRight = winLeft + dexActiveDragWin.offsetWidth;
                const snapWidth = dexActiveDragWin.offsetWidth / 4;
                const winId = dexActiveDragWin.id;

                dexActiveDragWin.classList.remove('dragging', 'no-transition');
                dexActiveDragWin = null;

                // Hide all snap indicators
                const snapIndicator = document.getElementById('dex-snap-indicator');
                if (snapIndicator) snapIndicator.style.display = 'none';
                const snapTopIndicator = document.getElementById('dex-snap-top-indicator');
                if (snapTopIndicator) snapTopIndicator.style.display = 'none';

                // Trigger correct snap if enabled
                const savedEdges = localStorage.getItem('goldenos_smart_edges');
                const edgesEnabled = savedEdges === null ? true : (savedEdges === 'true');

                if (edgesEnabled) {
                    if (winTop < 20) {
                        maximizeDexWindow(winId);
                    } else if (winLeft < -snapWidth) {
                        splitDexWindow(winId, 'left');
                    } else if (winRight > window.innerWidth + snapWidth) {
                        splitDexWindow(winId, 'right');
                    }
                }
            }
            if (dexActiveResizeWin) {
                document.body.classList.remove('resizing');
                dexActiveResizeWin.classList.remove('no-transition', 'dragging');
                dexActiveResizeWin = null;
            }
        }

        function openModal(id) {
            document.getElementById(id).classList.add('show');
            document.body.style.overflow = 'hidden';

            if (id === 'dock-settings-modal') {
                const dexSec = document.getElementById('dex-settings-section');
                if (dexSec) dexSec.style.display = isDexMode ? 'block' : 'none';
                loadDockPreview();
            }
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('show');
            document.body.style.overflow = '';
        }

        function changeCategory(category) {
            // SPA-style switching for Classic Mode
            const grids = document.querySelectorAll('.category-grid');
            const tabs = document.querySelectorAll('.category-tab');
            const searchInput = document.getElementById('classic-search-input');

            // Clear search when changing category
            if (searchInput) {
                searchInput.value = '';
                filterClassicApps();
            }

            grids.forEach(g => g.style.display = 'none');
            const activeGrid = document.getElementById('grid-' + category);
            if (activeGrid) {
                activeGrid.style.display = 'grid';
                // Refresh custom items for this category
                if (['webs', 'apps', 'games'].includes(category)) {
                    renderClassicCategory(category);
                }
            } else {
                // Fallback to reload if grid not found (e.g. Dex Mode doesn't use these grids yet)
                window.location.href = '<?= $_SERVER['PHP_SELF']?>?category=' + category;
                return;
            }

            tabs.forEach(t => t.classList.remove('active'));
            const activeTab = document.querySelector('.category-tab.' + category);
            if (activeTab) activeTab.classList.add('active');
        }

        function filterClassicApps() {
            const term = document.getElementById('classic-search-input').value.toLowerCase();
            const grids = document.querySelectorAll('.category-grid');
            let activeGrid = null;

            grids.forEach(g => {
                if (window.getComputedStyle(g).display !== 'none') {
                    activeGrid = g;
                }
            });

            if (!activeGrid) return;

            const apps = activeGrid.querySelectorAll('.app-item');
            apps.forEach(app => {
                const nameAttr = app.getAttribute('data-name');
                if (!nameAttr) return; // Safeguard against items without names (like + button)
                const name = nameAttr.toLowerCase();
                app.style.display = name.includes(term) ? 'flex' : 'none';
            });
        }

        function toggleSettingsPanel() {
            const panel = document.getElementById('settings-panel');
            if (panel.classList.contains('show')) {
                closeSettingsPanel();
            } else {
                openSettingsPanel();
            }
        }

        function openSettingsPanel() {
            document.getElementById('settings-panel').classList.add('show');
            document.getElementById('settings-overlay').classList.add('show');

            // Show/Hide Smart Options button based on Dex Mode
            const smartBtn = document.getElementById('smart-options-btn');
            if (smartBtn) {
                smartBtn.style.display = isDexMode ? 'flex' : 'none';
            }

            // Reset to main view
            backToMainSettings();
        }

        function closeSettingsPanel() {
            document.getElementById('settings-panel').classList.remove('show');
            document.getElementById('settings-overlay').classList.remove('show');
        }

        function openSmartOptions() {
            // Hide main content
            document.querySelector('#settings-panel .settings-content').style.display = 'none';
            // Show smart options
            document.getElementById('settings-smart-options').style.display = 'block';
        }

        function backToMainSettings() {
            // Show main content
            document.querySelector('#settings-panel .settings-content').style.display = 'block';
            // Hide smart options
            document.getElementById('settings-smart-options').style.display = 'none';
        }

        // ---- Dock ----
        function loadDock() {
            const dock = document.getElementById('dock');
            dock.innerHTML = '';
            const dockConfig = safeJSONParse('goldenos_dock');

            dockConfig.forEach(appId => {
                if (!allApps[appId]) return;
                const app = allApps[appId];
                const isUrl = app.file.startsWith('http');
                const item = document.createElement('div');
                item.className = 'dock-item';
                item.setAttribute('tabindex', '0');
                item.onclick = () => openApp(app.file);
                if (app.icon && app.icon.trim()) {
                    const img = document.createElement('img');
                    img.src = 'icons/' + app.icon;
                    img.alt = app.name;
                    item.appendChild(img);
                } else {
                    const icon = document.createElement('i');
                    icon.innerHTML = isUrl ? renderSvgIcon('link') : renderSvgIcon('android');
                    icon.style.cssText = 'width:1.4rem;height:1.4rem;color:var(--gold)';
                    item.appendChild(icon);
                }
                dock.appendChild(item);
            });

            for (let i = dockConfig.length; i < 3; i++) {
                const empty = document.createElement('div');
                empty.className = 'dock-item';
                empty.setAttribute('tabindex', '0');
                empty.innerHTML = render_svg_icon('plus');
                empty.style.opacity = '0.3';
                dock.appendChild(empty);
            }
        }

        function loadDockPreview() {
            const preview = document.getElementById('dock-preview');
            preview.innerHTML = '';
            const dockConfig = safeJSONParse('goldenos_dock');
            const wrap = document.createElement('div');
            wrap.style.cssText = 'display:flex;gap:10px;margin-bottom:15px;';

            dockConfig.forEach(appId => {
                if (!allApps[appId]) return;
                const app = allApps[appId];
                const item = document.createElement('div');
                item.className = 'dock-item';
                item.style.cssText = 'width:50px;height:50px;';
                if (app.icon) {
                    const img = document.createElement('img');
                    img.src = 'icons/' + app.icon;
                    img.alt = app.name;
                    img.style.maxWidth = '70%';
                    item.appendChild(img);
                } else {
                    ico.innerHTML = renderSvgIcon('th');
                    ico.style.cssText = 'width:1.2rem;height:1.2rem;color:var(--gold)';
                    item.appendChild(ico);
                }
                wrap.appendChild(item);
            });

            preview.appendChild(wrap);
            for (let i = 1; i <= 3; i++) {
                const sel = document.getElementById('dock-app-' + i);
                sel.value = dockConfig[i - 1] || '';
            }
        }

        function saveDockConfig() {
            const config = [];
            for (let i = 1; i <= 3; i++) {
                const v = document.getElementById('dock-app-' + i).value;
                if (v) config.push(v);
            }
            localStorage.setItem('goldenos_dock', JSON.stringify(config));
            loadDock();
            if (isDexMode) renderDexFavorites();
            closeModal('dock-settings-modal');
            showToast('Configuração da dock salva!', 'success');
        }

        // ---- Wallpaper ----
        function loadWallpaper() {
            const wp = localStorage.getItem('goldenos_wallpaper');
            if (wp) {
                applyWallpaper(wp);
            }
        }

        function applyWallpaper(src) {
            if (!src) return;
            try {
                // Restore body background property before applying image
                document.body.style.background = '';
                document.body.style.backgroundImage = `url("${src}")`;
                document.body.classList.add('custom-wallpaper');

                // Apply to wallpaper layer (used for transition/layering effects)
                const layer = document.getElementById('wallpaper-layer');
                if (layer) {
                    layer.style.display = 'block';
                    layer.style.backgroundImage = `url("${src}")`;
                    layer.style.backgroundSize = 'cover';
                    layer.style.backgroundPosition = 'center';
                }

                // Apply to preview in modal
                const prev = document.getElementById('wallpaper-preview');
                if (prev) {
                    prev.style.backgroundImage = `url("${src}")`;
                    prev.innerHTML = '';
                }
            } catch (e) {
                console.error('Erro ao aplicar wallpaper:', e);
            }
        }

        function saveWallpaper() {
            const input = document.getElementById('wallpaper-input');
            if (input.files.length) {
                resizeImage(input.files[0], 1280, 10, (data) => {
                    localStorage.setItem('goldenos_wallpaper', data);
                    localStorage.removeItem('goldenos_animated_wallpaper');
                    _clearAnimated();
                    applyWallpaper(data);
                    closeModal('wallpaper-modal');
                    showToast('Wallpaper salvo e otimizado!', 'success');
                });
            } else {
                const selected = document.querySelector('.wallpaper-thumb.selected');
                if (selected) {
                    localStorage.setItem('goldenos_wallpaper', selected.dataset.src);
                    localStorage.removeItem('goldenos_animated_wallpaper');
                    _clearAnimated();
                    applyWallpaper(selected.dataset.src);
                    closeModal('wallpaper-modal');
                    showToast('Wallpaper aplicado!', 'success');
                } else {
                    showToast('Selecione uma imagem ou wallpaper animado na outra aba.', 'error');
                }
            }
        }

        function restoreDefaultWallpaper() {
            localStorage.removeItem('goldenos_wallpaper');
            localStorage.removeItem('goldenos_animated_wallpaper');
            _clearAnimated();

            // Clear body
            document.body.style.backgroundImage = '';
            document.body.classList.remove('custom-wallpaper');

            // Clear layer
            const layer = document.getElementById('wallpaper-layer');
            if (layer) {
                layer.style.backgroundImage = '';
                layer.style.display = 'none';
            }
            const prev = document.getElementById('wallpaper-preview');
            prev.style.backgroundImage = '';
            prev.innerHTML = `<div style="display:flex;justify-content:center;align-items:center;height:100%;color:rgba(255,255,255,0.5);">${renderSvgIcon('image', 'fa-2x')}</div>`;
            closeModal('wallpaper-modal');
            showToast('Wallpaper padrão restaurado!', 'success');
        }

        // ---- Widgets ----
        function loadWidgetSettings() {
            ['time', 'calendar', 'ping', 'music'].forEach(w => {
                const enabled = localStorage.getItem(`goldenos_widget_${w}`) === 'true';
                document.getElementById(`${w}-toggle`).checked = enabled;
                toggleWidget(w, enabled);
                document.getElementById(`${w}-toggle`).addEventListener('change', function () {
                    toggleWidget(w, this.checked);
                    localStorage.setItem(`goldenos_widget_${w}`, this.checked);
                });
            });
            ['time-widget', 'calendar-widget', 'ping-widget', 'music-widget'].forEach(id => {
                loadWidgetPosition(id);
                makeWidgetDraggable(id);
            });
        }

        function toggleWidgetState(widgetInfo) {
            const toggle = document.getElementById(`${widgetInfo}-toggle`);
            if (toggle) {
                toggle.checked = !toggle.checked;
                toggleWidget(widgetInfo, toggle.checked);
                localStorage.setItem(`goldenos_widget_${widgetInfo}`, toggle.checked);
            }
        }

        function toggleWidget(widget, enable) {
            const el = document.getElementById(`${widget}-widget`);
            if (enable) {
                el.classList.add('active');
                if (widget === 'time') { updateTime(); setInterval(updateTime, 1000); }
                if (widget === 'calendar') { updateCalendar(); }
                if (widget === 'ping') { updatePing(); setInterval(updatePing, 5000); }
                if (widget === 'music') { initMusicWidget(); }
                loadWidgetPosition(`${widget}-widget`);
            } else {
                el.classList.remove('active');
                // IMPORTANTE: Se o widget for de música, o áudio CONTINUA TOCANDO no background.
                // Só para se a pessoa pausar no player ou fechar a aba.
                if (widget === 'music' && _musicAudio && !_musicAudio.paused) {
                    console.log("[GoldenOS] Player de música oculto, mas continuando no background.");
                }
            }
        }

        function updateTime() {
            const n = new Date();
            document.getElementById('current-time').textContent =
                `${n.getHours().toString().padStart(2, '0')}:${n.getMinutes().toString().padStart(2, '0')}:${n.getSeconds().toString().padStart(2, '0')}`;
        }

        function updateCalendar() {
            document.getElementById('current-date').textContent =
                new Date().toLocaleDateString('pt-BR', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
        }

        function updatePing() {
            const start = Date.now();
            fetch(window.location.href, { method: 'HEAD', cache: 'no-cache' })
                .then(() => { document.getElementById('ping-value').textContent = `${Date.now() - start} ms`; })
                .catch(() => { document.getElementById('ping-value').textContent = 'Erro'; });
        }

        function loadWidgetPosition(id) {
            const widget = document.getElementById(id);
            if (!widget) return;

            const pos = safeJSONParse(`goldenos_${id}_position`, {});
            const defaults = {
                'time-widget': { top: 70, left: window.innerWidth - 250 },
                'calendar-widget': { top: 200, left: window.innerWidth - 250 },
                'ping-widget': { top: 330, left: window.innerWidth - 250 },
                'music-widget': { top: 70, left: 20 }
            };

            const applyPos = () => {
                let top = pos.top ?? (defaults[id] ? defaults[id].top : 70);
                let left = pos.left ?? (defaults[id] ? defaults[id].left : 20);

                // Clamp to screen accurately
                const maxX = Math.max(0, window.innerWidth - widget.offsetWidth);
                const bottomMargin = isDexMode ? 50 : 56;
                const maxY = Math.max(0, window.innerHeight - widget.offsetHeight - bottomMargin);

                left = Math.max(0, Math.min(left, maxX));
                top = Math.max(0, Math.min(top, maxY));

                widget.style.top = `${top}px`;
                widget.style.left = `${left}px`;
            };

            // Use requestAnimationFrame to ensure dimensions are ready if the widget just became visible
            requestAnimationFrame(applyPos);
        }

        // ---- Music Player Logic ----
        let _musicAudio = new Audio();
        let _musicFiles = [];
        let _musicIndex = 0;

        function initMusicWidget() {
            document.getElementById('music-folder-input').addEventListener('change', function (e) {
                const files = Array.from(e.target.files).filter(f => f.type.startsWith('audio/'));
                if (files.length === 0) {
                    showToast('Nenhuma música encontrada nesta pasta.', 'error');
                    return;
                }

                // Ordenar alfabeticamente
                files.sort((a, b) => a.name.localeCompare(b.name));
                _musicFiles = files;
                _musicIndex = 0;

                renderMusicPlaylist();
                playMusicIndex(0);
            });

            _musicAudio.addEventListener('ended', () => {
                musicNext();
            });
        }

        function renderMusicPlaylist() {
            const list = document.getElementById('music-playlist');
            list.innerHTML = '';
            _musicFiles.forEach((file, index) => {
                const div = document.createElement('div');
                div.className = 'playlist-item' + (index === _musicIndex ? ' playing' : '');
                div.textContent = file.name.replace(/\.[^/.]+$/, ""); // remover extensão
                div.onclick = () => playMusicIndex(index);
                list.appendChild(div);
            });
        }

        function playMusicIndex(index) {
            if (index < 0 || index >= _musicFiles.length) return;
            _musicIndex = index;

            const file = _musicFiles[index];
            const url = URL.createObjectURL(file);
            _musicAudio.src = url;
            _musicAudio.play().then(() => {
                document.getElementById('music-current-title').textContent = file.name.replace(/\.[^/.]+$/, "");
                updateMusicPlaypauseBtn();
                renderMusicPlaylist(); // atualizar classe 'playing'

                // Dar um leve scroll para mostrar a música atual na lista
                const list = document.getElementById('music-playlist');
                const activeEl = list.children[index];
                if (activeEl) {
                    list.scrollTop = activeEl.offsetTop - list.offsetTop - 50;
                }
            }).catch(e => console.error("Erro ao tocar música:", e));
        }

        function musicTogglePlay() {
            if (_musicFiles.length === 0) return;
            if (_musicAudio.paused) {
                _musicAudio.play();
            } else {
                _musicAudio.pause();
            }
            updateMusicPlaypauseBtn();
        }

        function updateMusicPlaypauseBtn() {
            const iconWrap = document.getElementById('music-play-btn');
            if (_musicAudio.paused) {
                iconWrap.innerHTML = renderSvgIcon('play');
            } else {
                iconWrap.innerHTML = renderSvgIcon('pause');
            }
        }

        function musicNext() {
            if (_musicFiles.length === 0) return;
            if (_musicIndex + 1 < _musicFiles.length) {
                playMusicIndex(_musicIndex + 1);
            } else {
                playMusicIndex(0); // Volta pro começo
            }
        }

        function musicPrev() {
            if (_musicFiles.length === 0) return;
            if (_musicIndex - 1 >= 0) {
                playMusicIndex(_musicIndex - 1);
            } else {
                playMusicIndex(_musicFiles.length - 1); // Vai pro último
            }
        }

        function saveWidgetPosition(id, top, left) {
            localStorage.setItem(`goldenos_${id}_position`, JSON.stringify({ top, left }));
        }

        function makeWidgetDraggable(id) {
            const widget = document.getElementById(id);
            let isDragging = false, offset = { x: 0, y: 0 };

            const startDrag = (e) => {
                isDragging = true;
                const clientX = e.type.includes('touch') ? e.touches[0].clientX : e.clientX;
                const clientY = e.type.includes('touch') ? e.touches[0].clientY : e.clientY;
                offset = { x: clientX - widget.offsetLeft, y: clientY - widget.offsetTop };

                if (e.type.includes('mouse')) {
                    e.preventDefault(); // Black browser default selection
                    document.addEventListener('mousemove', drag);
                    document.addEventListener('mouseup', stopDrag);
                } else {
                    document.addEventListener('touchmove', drag, { passive: false });
                    document.addEventListener('touchend', stopDrag);
                }
                widget.style.zIndex = '150'; // Still behind windows
            };

            widget.querySelector('.widget-header').addEventListener('mousedown', startDrag);
            widget.querySelector('.widget-header').addEventListener('touchstart', startDrag, { passive: false });

            function drag(e) {
                if (!isDragging) return;
                const clientX = e.type.includes('touch') ? e.touches[0].clientX : e.clientX;
                const clientY = e.type.includes('touch') ? e.touches[0].clientY : e.clientY;

                const maxX = window.innerWidth - widget.offsetWidth;
                const taskbarHeight = isDexMode ? 50 : 0;
                const bottomMargin = isDexMode ? 50 : 56; // 50 for taskbar, 56 for normal mode footer

                const maxY = window.innerHeight - widget.offsetHeight - bottomMargin;
                widget.style.left = `${Math.max(0, Math.min(clientX - offset.x, maxX))}px`;
                widget.style.top = `${Math.max(0, Math.min(clientY - offset.y, maxY))}px`;

                if (e.type.includes('touch')) e.preventDefault(); // Prevent scrolling while dragging
            }

            function stopDrag() {
                isDragging = false;
                document.removeEventListener('mousemove', drag);
                document.removeEventListener('mouseup', stopDrag);
                document.removeEventListener('touchmove', drag);
                document.removeEventListener('touchend', stopDrag);
                saveWidgetPosition(id, parseInt(widget.style.top), parseInt(widget.style.left));
            }
        }

        // ---- Init ----
        function _startup() {
            try {
                // Global Fullscreen trigger
                const requestGlobalFullscreen = () => {
                    if (!document.fullscreenElement) {
                        if (document.documentElement.requestFullscreen) {
                            document.documentElement.requestFullscreen().catch(e => console.log("Fullscreen blocked:", e));
                        } else if (document.documentElement.webkitRequestFullscreen) {
                            document.documentElement.webkitRequestFullscreen().catch(e => console.log("Fullscreen blocked:", e));
                        }
                    }
                };
                document.addEventListener('click', requestGlobalFullscreen);
                document.addEventListener('touchstart', requestGlobalFullscreen, { passive: true });

                // Load All Settings
                loadDock();
                loadWallpaper();
                loadWidgetSettings();
                loadAccentColor();
                loadAppTextColor();
                loadHideNamesSetting();
                loadRgbGamer();
                loadDexTraySettings();
                loadCustomWebsClassic();

                // Initialize Modes
                const showPhpAnimation = <?= $showAnimation ? 'true' : 'false' ?>;
                if (showPhpAnimation) {
                    playModeSwitchAnimation(true);
                } else {
                    if (!isDexMode) {
                        document.getElementById('main-content').style.display = 'block';
                    } else {
                        const dexDesktop = document.getElementById('dex-desktop');
                        const dexTaskbar = document.getElementById('dex-taskbar');
                        if (dexDesktop) dexDesktop.style.setProperty('display', 'flex', 'important');
                        if (dexTaskbar) dexTaskbar.style.setProperty('display', 'flex', 'important');
                        initDexMode();
                    }
                }

                // Finalize UI
                _initAnimatedWallpaper();

                window.addEventListener('resize', () => {
                    if (isDexMode) {
                        renderDexDesktop();
                    }
                    ['time-widget', 'calendar-widget', 'ping-widget', 'music-widget'].forEach(id => {
                        const el = document.getElementById(id);
                        if (el && el.classList.contains('active')) loadWidgetPosition(id);
                    });
                });

                // Set up wallpaper selection listeners
                document.querySelectorAll('.wallpaper-thumb').forEach(thumb => {
                    thumb.addEventListener('click', function () {
                        document.getElementById('wallpaper-input').value = '';
                        document.querySelectorAll('.wallpaper-thumb').forEach(t => t.classList.remove('selected'));
                        this.classList.add('selected');
                        applyWallpaper(this.dataset.src);
                        localStorage.setItem('goldenos_wallpaper', this.dataset.src);
                        localStorage.removeItem('goldenos_animated_wallpaper');
                        if (typeof _clearAnimated === 'function') _clearAnimated();
                    });
                });

                const wpInput = document.getElementById('wallpaper-input');
                if (wpInput) {
                    wpInput.addEventListener('change', function (e) {
                        if (!e.target.files.length) return;
                        const reader = new FileReader();
                        reader.onload = e => {
                            const preview = document.getElementById('wallpaper-preview');
                            if (preview) {
                                preview.style.backgroundImage = `url(${e.target.result})`;
                                preview.innerHTML = '';
                            }
                            document.querySelectorAll('.wallpaper-thumb').forEach(t => t.classList.remove('selected'));
                        };
                        reader.readAsDataURL(e.target.files[0]);
                    });
                }
            } catch (err) {
                console.error("Startup Failure:", err);
            }
        }

        document.addEventListener('DOMContentLoaded', _startup);

        function setAccentColor(color) {
            const root = document.documentElement;
            root.style.setProperty('--gold', color);

            // Generate light/dark/glow versions
            const adjust = (hex, amt) => {
                const num = parseInt(hex.replace("#", ""), 16),
                    R = (num >> 16) + amt,
                    G = (num >> 8 & 0x00FF) + amt,
                    B = (num & 0x0000FF) + amt;
                return "#" + (0x1000000 + (R < 255 ? R < 0 ? 0 : R : 255) * 0x10000 + (G < 255 ? G < 0 ? 0 : G : 255) * 0x100 + (B < 255 ? B < 0 ? 0 : B : 255)).toString(16).slice(1);
            };

            root.style.setProperty('--gold-light', adjust(color, 40));
            root.style.setProperty('--gold-dark', adjust(color, -40));

            const r = parseInt(color.slice(1, 3), 16),
                g = parseInt(color.slice(3, 5), 16),
                b = parseInt(color.slice(5, 7), 16);
            root.style.setProperty('--gold-glow', `rgba(${r}, ${g}, ${b}, 0.25)`);

            localStorage.setItem('goldenos_accent_color', color);

            // Update visual swatch
            const swatch = document.getElementById('accent-color-swatch');
            if (swatch) swatch.style.background = color;
        }

        let _colorProxyTarget = null;

        function openColorProxy(target) {
            const popup = document.getElementById('color-picker-popup');
            const proxy = document.getElementById('color-proxy-input');
            const label = document.getElementById('color-picker-label');
            if (!popup || !proxy) return;
            _colorProxyTarget = target;
            const currentColor = target === 'accent'
                ? (localStorage.getItem('goldenos_accent_color') || '#FFD700')
                : (localStorage.getItem('goldenos_app_text_color') || '#ffffff');
            proxy.value = currentColor;
            if (label) label.textContent = target === 'accent' ? 'Cor de Destaque' : 'Cor do Texto';
            proxy.oninput = (e) => {
                if (_colorProxyTarget === 'accent') setAccentColor(e.target.value);
                else setAppTextColor(e.target.value);
            };
            popup.style.display = 'flex';
        }

        function closeColorProxy() {
            const popup = document.getElementById('color-picker-popup');
            if (popup) popup.style.display = 'none';
        }

        function loadAccentColor() {
            const color = localStorage.getItem('goldenos_accent_color') || '#FFD700';
            setAccentColor(color);
        }

        function resetAccentColor() {
            setRgbGamer(false);
            setAccentColor('#FFD700');
        }

        let _rgbGamerInterval = null;
        let _rgbHue = 0;
        const _rgbSpeeds = [0.05, 0.1, 0.2, 0.5, 1, 1.5, 2, 3, 5, 10];
        let _rgbSpeed = parseFloat(localStorage.getItem('goldenos_rgb_speed') || '1');

        function setRgbSpeed(speed) {
            _rgbSpeed = speed;
            localStorage.setItem('goldenos_rgb_speed', speed);
            const btn = document.getElementById('rgb-speed-cycle-btn');
            if (btn) btn.textContent = speed + 'x';
        }

        function cycleRgbSpeed() {
            let currentIndex = _rgbSpeeds.indexOf(_rgbSpeed);
            if (currentIndex === -1) currentIndex = _rgbSpeeds.indexOf(1); // Default to 1x index or first
            if (currentIndex === -1) currentIndex = 4; // Fallback to 1x index if not found (0.05, 0.1, 0.2, 0.5, [1]...)
            const nextIndex = (currentIndex + 1) % _rgbSpeeds.length;
            setRgbSpeed(_rgbSpeeds[nextIndex]);
        }

        function toggleRgbGamer(enabled) {
            localStorage.setItem('goldenos_rgb_gamer', enabled ? 'true' : 'false');
            setRgbGamer(enabled);
        }

        function setRgbGamer(enabled) {
            const toggle = document.getElementById('rgb-gamer-toggle');
            if (toggle) toggle.checked = enabled;
            if (enabled) {
                if (_rgbGamerInterval) return; // already running
                _rgbGamerInterval = setInterval(() => {
                    _rgbHue = (_rgbHue + 0.5 * _rgbSpeed) % 360;
                    const root = document.documentElement;
                    const r = Math.round(255 * Math.max(0, Math.min(1, Math.abs((_rgbHue / 60) % 6 - 3) - 1)));
                    const g = Math.round(255 * Math.max(0, Math.min(1, 2 - Math.abs((_rgbHue / 60) % 6 - 2))));
                    const b = Math.round(255 * Math.max(0, Math.min(1, 2 - Math.abs((_rgbHue / 60) % 6 - 4))));
                    const hex = '#' + [r, g, b].map(x => x.toString(16).padStart(2, '0')).join('');
                    root.style.setProperty('--gold', hex);
                    root.style.setProperty('--gold-glow', `rgba(${r}, ${g}, ${b}, 0.25)`);

                    const swatch = document.getElementById('accent-color-swatch');
                    if (swatch) swatch.style.background = hex;
                }, 30);
            } else {
                if (_rgbGamerInterval) { clearInterval(_rgbGamerInterval); _rgbGamerInterval = null; }
                const saved = localStorage.getItem('goldenos_accent_color') || '#FFD700';
                setAccentColor(saved);
            }
        }

        // ============================================================
        // SPATIAL NAVIGATION ENGINE (GAMEPAD & REMOTE)
        // ============================================================
        let currentFocus = null;
        let lastInteractionType = 'mouse'; // 'mouse', 'touch', 'spatial'

        function updateFocus(newEl) {
            if (currentFocus) currentFocus.classList.remove('nav-focus');
            currentFocus = newEl;
            if (currentFocus) {
                // Only show visual focus indicator (gold glow) if interaction is 'spatial' (keyboard/gamepad)
                if (lastInteractionType === 'spatial') {
                    currentFocus.classList.add('nav-focus');
                }
                currentFocus.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }

        function getFocusableElements() {
            // Contexto: se houver modal aberto
            const openModal = document.querySelector('.modal.show');
            if (openModal) {
                return Array.from(openModal.querySelectorAll('button, input, select, [tabindex="0"]')).filter(el => {
                    const style = window.getComputedStyle(el);
                    return style.display !== 'none' && style.visibility !== 'hidden' && !el.closest('.no-focus');
                });
            }

            // Settings Panel
            const settingsPanel = document.getElementById('settings-panel');
            if (settingsPanel && settingsPanel.classList.contains('show')) {
                return Array.from(settingsPanel.querySelectorAll('button, input, select, [tabindex="0"], .settings-btn')).filter(el => {
                    const style = window.getComputedStyle(el);
                    return style.display !== 'none' && style.visibility !== 'hidden';
                });
            }

            // Normal Mode Focusables
            if (!isDexMode) {
                const elements = [];
                // Grid apps visible (active grid)
                const activeGrid = Array.from(document.querySelectorAll('.category-grid')).find(g => window.getComputedStyle(g).display !== 'none');
                if (activeGrid) {
                    elements.push(...Array.from(activeGrid.querySelectorAll('.app-item')));
                }
                // Categories
                elements.push(...Array.from(document.querySelectorAll('.category-tab')));
                // Settings
                elements.push(document.querySelector('.gear-btn'));
                // Search
                elements.push(document.getElementById('classic-search-input'));
                // Dock
                elements.push(...Array.from(document.querySelectorAll('.dock-item')));

                return elements.filter(el => el && window.getComputedStyle(el).display !== 'none');
            }

            // Dex Mode Focusables
            if (isDexMode) {
                const elements = [];
                const startMenu = document.getElementById('dex-start-menu');

                if (startMenu && startMenu.classList.contains('show')) {
                    elements.push(document.getElementById('dex-search-input'));
                    elements.push(...Array.from(startMenu.querySelectorAll('.dex-start-cat-btn')));
                    elements.push(...Array.from(startMenu.querySelectorAll('.dex-start-app')));
                }

                // Desktop Icons
                elements.push(...Array.from(document.querySelectorAll('.dex-desktop-icon')));
                // Taskbar
                elements.push(document.querySelector('.dex-start-btn'));
                elements.push(...Array.from(document.querySelectorAll('.dex-fav-item')));
                elements.push(...Array.from(document.querySelectorAll('.dex-taskbar-item')));
                // Tray
                elements.push(...Array.from(document.querySelectorAll('.dex-system-tray div')));

                return elements.filter(el => el && window.getComputedStyle(el).display !== 'none');
            }
            return [];
        }

        function navigate(direction) {
            const elements = getFocusableElements();
            if (elements.length === 0) return;

            if (!currentFocus || !elements.includes(currentFocus)) {
                updateFocus(elements[0]);
                return;
            }

            const currentRect = currentFocus.getBoundingClientRect();
            let nearest = null;
            let minDistance = Infinity;

            elements.forEach(el => {
                if (el === currentFocus) return;
                const rect = el.getBoundingClientRect();

                let isValido = false;
                let distance = 0;

                const cx = currentRect.left + currentRect.width / 2;
                const cy = currentRect.top + currentRect.height / 2;
                const ex = rect.left + rect.width / 2;
                const ey = rect.top + rect.height / 2;

                if (direction === 'up' && rect.bottom <= currentRect.top + 5) {
                    isValido = true;
                    distance = Math.sqrt(Math.pow(cx - ex, 2) + Math.pow(cy - ey, 2) * 2); // Peso no Y para preferir mesma coluna
                } else if (direction === 'down' && rect.top >= currentRect.bottom - 5) {
                    isValido = true;
                    distance = Math.sqrt(Math.pow(cx - ex, 2) + Math.pow(cy - ey, 2) * 2);
                } else if (direction === 'left' && rect.right <= currentRect.left + 5) {
                    isValido = true;
                    distance = Math.sqrt(Math.pow(cx - ex, 2) * 2 + Math.pow(cy - ey, 2)); // Peso no X para preferir mesma linha
                } else if (direction === 'right' && rect.left >= currentRect.right - 5) {
                    isValido = true;
                    distance = Math.sqrt(Math.pow(cx - ex, 2) * 2 + Math.pow(cy - ey, 2));
                }

                if (isValido && distance < minDistance) {
                    minDistance = distance;
                    nearest = el;
                }
            });

            if (nearest) updateFocus(nearest);
        }

        // Keyboard Listeners
        window.addEventListener('keydown', (e) => {
            if (['ArrowUp', 'ArrowDown', 'ArrowLeft', 'ArrowRight'].includes(e.key)) {
                e.preventDefault();
                lastInteractionType = 'spatial';
                navigate(e.key.replace('Arrow', '').toLowerCase());
            } else if (e.key === 'Enter' && currentFocus) {
                lastInteractionType = 'spatial';
                currentFocus.click();
            }
        });

        // Gamepad Loop
        let gamepadLoopId = null;
        let lastGamepadAxes = [0, 0];
        let lastGamepadButtons = [];

        function startGamepadLoop() {
            const gamepads = navigator.getGamepads();
            if (!gamepads) return;

            const gp = gamepads[0];
            if (!gp) {
                gamepadLoopId = requestAnimationFrame(startGamepadLoop);
                return;
            }

            // D-Pad (Buttons 12, 13, 14, 15: Up, Down, Left, Right)
            const buttons = gp.buttons.map(b => b.pressed);

            if (buttons[12] && !lastGamepadButtons[12]) { lastInteractionType = 'spatial'; navigate('up'); }
            if (buttons[13] && !lastGamepadButtons[13]) { lastInteractionType = 'spatial'; navigate('down'); }
            if (buttons[14] && !lastGamepadButtons[14]) { lastInteractionType = 'spatial'; navigate('left'); }
            if (buttons[15] && !lastGamepadButtons[15]) { lastInteractionType = 'spatial'; navigate('right'); }

            // A Button (Button 0)
            if (buttons[0] && !lastGamepadButtons[0] && currentFocus) {
                lastInteractionType = 'spatial';
                currentFocus.click();
            }

            // Stick Navigation (with threshold)
            const threshold = 0.5;
            if (gp.axes[0] < -threshold && lastGamepadAxes[0] >= -threshold) { lastInteractionType = 'spatial'; navigate('left'); }
            if (gp.axes[0] > threshold && lastGamepadAxes[0] <= threshold) { lastInteractionType = 'spatial'; navigate('right'); }
            if (gp.axes[1] < -threshold && lastGamepadAxes[1] >= -threshold) { lastInteractionType = 'spatial'; navigate('up'); }
            if (gp.axes[1] > threshold && lastGamepadAxes[1] <= threshold) { lastInteractionType = 'spatial'; navigate('down'); }

            lastGamepadButtons = buttons;
            lastGamepadAxes = [gp.axes[0], gp.axes[1]];

            gamepadLoopId = requestAnimationFrame(startGamepadLoop);
        }

        window.addEventListener("gamepadconnected", (e) => {
            console.log("Gamepad connected:", e.gamepad);
            if (!gamepadLoopId) startGamepadLoop();
        });

        // Hide focus indicator on touch/mouse interaction
        document.addEventListener('touchstart', (e) => {
            lastInteractionType = 'touch';
            if (currentFocus) {
                currentFocus.classList.remove('nav-focus');
                currentFocus = null;
            }
        }, { passive: true });

        document.addEventListener('mousedown', (e) => {
            lastInteractionType = 'mouse';
            // Also hide focus on mouse click if it's not a spatial nav context
            if (currentFocus && !e.target.closest('.nav-focus')) {
                currentFocus.classList.remove('nav-focus');
                currentFocus = null;
            }
        }, { passive: true });

        function loadRgbGamer() {
            // Apply saved speed highlight
            setRgbSpeed(_rgbSpeed);
            if (localStorage.getItem('goldenos_rgb_gamer') === 'true') {
                setRgbGamer(true);
            }
        }
        function setAppTextColor(color) {
            document.documentElement.style.setProperty('--app-text-color', color);
            localStorage.setItem('goldenos_app_text_color', color);
            const swatch = document.getElementById('text-color-swatch');
            if (swatch) swatch.style.background = color;
        }

        function loadAppTextColor() {
            const color = localStorage.getItem('goldenos_app_text_color') || '#ffffff';
            setAppTextColor(color);
        }

        function setHideNames(hide) {
            if (hide) {
                document.body.classList.add('hide-app-names');
            } else {
                document.body.classList.remove('hide-app-names');
            }
            localStorage.setItem('goldenos_hide_names', hide);
        }

        function loadHideNamesSetting() {
            const hide = localStorage.getItem('goldenos_hide_names') === 'true';
            document.getElementById('hide-names-toggle').checked = hide;
            setHideNames(hide);
            document.getElementById('hide-names-toggle').addEventListener('change', function () {
                setHideNames(this.checked);
            });
        }
        function openAddWebModal() {
            const modal = document.getElementById('add-web-modal');
            modal.style.display = 'flex';
            setTimeout(() => modal.classList.add('show'), 10);
            switchWebModalTab('add');
        }

        function closeAddWebModal() {
            const modal = document.getElementById('add-web-modal');
            modal.classList.remove('show');
            setTimeout(() => {
                modal.style.display = 'none';
                document.getElementById('web-name-input').value = '';
                document.getElementById('web-url-input').value = '';
                document.getElementById('web-icon-input').value = '';
                document.getElementById('icon-preview-container').innerHTML = '<span style="opacity: 0.3; font-size: 0.8rem;">Preview</span>';
            }, 200);
        }

        function switchWebModalTab(tab) {
            const addSec = document.getElementById('web-modal-add-section');
            const manageSec = document.getElementById('web-modal-manage-section');
            const addTabBtn = document.getElementById('tab-add-btn');
            const manageTabBtn = document.getElementById('tab-manage-btn');

            if (tab === 'add') {
                addSec.style.display = 'block';
                manageSec.style.display = 'none';
                addTabBtn.classList.add('active');
                manageTabBtn.classList.remove('active');
            } else {
                addSec.style.display = 'none';
                manageSec.style.display = 'block';
                addTabBtn.classList.remove('active');
                manageTabBtn.classList.add('active');
                renderManageList();
            }
        }

        function renderManageList() {
            const list = document.getElementById('manage-web-list');
            if (!list) return;
            list.innerHTML = '';
            const customWebs = safeJSONParse('goldenos_custom_webs');

            if (customWebs.length === 0) {
                list.innerHTML = '<p style="opacity: 0.5; font-size: 0.9rem; text-align: center; margin-top: 20px;">Nenhum site adicionado ainda.</p>';
                return;
            }

            customWebs.forEach(web => {
                const item = document.createElement('div');
                item.className = 'manage-item';

                const isBase64 = web.icon && web.icon.startsWith('data:');
                const iconSrc = isBase64 ? web.icon : (web.icon ? `icons/${web.icon}` : '');
                let iconHtml = renderSvgIcon('link');
                if (iconSrc) {
                    iconHtml = `<img src="${iconSrc}" onerror="this.outerHTML=renderSvgIcon('link')">`;
                }

                item.innerHTML = `
                    <div class="manage-item-info">
                        ${iconHtml}
                        <div class="manage-item-name">
                            ${web.name}
                        </div>
                    </div>
                    <button class="manage-delete-btn" onclick="deleteCustomWeb('${web.id}')">
                        ${renderSvgIcon('trash')}
                    </button>
                `;
                list.appendChild(item);
            });
        }

        let _lastIconData = null;

        function resizeImage(file, maxDim, limitMB, callback) {
            if (!file) return;
            // Limit check
            if (file.size > limitMB * 1024 * 1024) {
                showToast(`Imagem muito pesada! Use uma imagem menor que ${limitMB}MB.`, 'error');
                return;
            }

            const reader = new FileReader();
            reader.onload = (e) => {
                const img = new Image();
                img.onload = () => {
                    const canvas = document.createElement('canvas');
                    let width = img.width;
                    let height = img.height;

                    if (width > height) {
                        if (width > maxDim) {
                            height *= maxDim / width;
                            width = maxDim;
                        }
                    } else {
                        if (height > maxDim) {
                            width *= maxDim / height;
                            height = maxDim;
                        }
                    }

                    canvas.width = width;
                    canvas.height = height;
                    const ctx = canvas.getContext('2d');
                    ctx.clearRect(0, 0, width, height); // Preserve transparency
                    ctx.drawImage(img, 0, 0, width, height);

                    callback(canvas.toDataURL('image/png'));
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }

        function previewWebIcon(input) {
            const file = input.files[0];
            if (file) {
                resizeImage(file, 96, 2, (data) => {
                    _lastIconData = data;
                    document.getElementById('icon-preview-container').innerHTML = `<img src="${data}">`;
                });
            }
        }

        function saveCustomWeb() {
            const name = document.getElementById('web-name-input').value.trim();
            const url = document.getElementById('web-url-input').value.trim();

            if (!name || !url) {
                showToast('Por favor, preencha o nome e o link.', 'error');
                return;
            }

            const customWebs = safeJSONParse('goldenos_custom_webs');
            const newWeb = {
                id: 'custom_' + Date.now(),
                name: name,
                file: url,
                icon: _lastIconData || '',
                category: 'webs',
                isCustom: true
            };

            customWebs.push(newWeb);
            localStorage.setItem('goldenos_custom_webs', JSON.stringify(customWebs));

            closeAddWebModal();
            _lastIconData = null;

            // Refresh grids
            if (isDexMode) renderDexStartMenu('webs');
            else renderClassicCategory('webs');
        }

        function deleteCustomWeb(id) {
            showConfirm('Remover Site', 'Tem certeza que deseja remover este site?', () => {
                let customWebs = safeJSONParse('goldenos_custom_webs');
                customWebs = customWebs.filter(w => w.id !== id);
                localStorage.setItem('goldenos_custom_webs', JSON.stringify(customWebs));

                // Refresh lists and grids
                renderManageList();
                if (isDexMode) renderDexStartMenu('webs');
                else renderClassicCategory('webs');
                showToast('Site removido!', 'info');
            });
        }

        // ---- Add Local App Logic ----
        let _lastAppIconData = null;

        function openAddAppModal() {
            const modal = document.getElementById('add-app-modal');
            modal.style.display = 'flex';
            setTimeout(() => modal.classList.add('show'), 10);
            switchAppModalTab('add');
        }

        function closeAddAppModal() {
            const modal = document.getElementById('add-app-modal');
            modal.classList.remove('show');
            setTimeout(() => {
                modal.style.display = 'none';
                document.getElementById('app-name-input').value = '';
                document.getElementById('app-code-input').value = '';
                document.getElementById('app-icon-input').value = '';
                document.getElementById('app-icon-preview-container').innerHTML = '<span style="opacity: 0.3; font-size: 0.8rem;">Preview</span>';
            }, 200);
        }

        function switchAppModalTab(tab) {
            const addSec = document.getElementById('app-modal-add-section');
            const manageSec = document.getElementById('app-modal-manage-section');
            const addTabBtn = document.getElementById('app-tab-add-btn');
            const manageTabBtn = document.getElementById('app-tab-manage-btn');

            if (tab === 'add') {
                addSec.style.display = 'block';
                manageSec.style.display = 'none';
                addTabBtn.classList.add('active');
                manageTabBtn.classList.remove('active');
            } else {
                addSec.style.display = 'none';
                manageSec.style.display = 'block';
                addTabBtn.classList.remove('active');
                manageTabBtn.classList.add('active');
                renderManageAppList();
            }
        }

        function previewAppIcon(input) {
            const file = input.files[0];
            if (file) {
                resizeImage(file, 96, 2, (data) => {
                    _lastAppIconData = data;
                    document.getElementById('app-icon-preview-container').innerHTML = `<img src="${data}" style="width:100%; height:100%; object-fit:cover;">`;
                });
            }
        }

        function saveCustomApp() {
            const name = document.getElementById('app-name-input').value.trim();
            const code = document.getElementById('app-code-input').value.trim();

            if (!name || !code) {
                showToast('Por favor, preencha o nome e o código.', 'error');
                return;
            }

            const customApps = safeJSONParse('goldenos_custom_apps');
            const newApp = {
                id: 'app_' + Date.now(),
                name: name,
                file: 'snippet:' + encodeURIComponent(code),
                icon: _lastAppIconData || '',
                category: 'apps',
                isCustom: true
            };

            customApps.push(newApp);
            localStorage.setItem('goldenos_custom_apps', JSON.stringify(customApps));

            closeAddAppModal();
            _lastAppIconData = null;

            if (isDexMode) renderDexStartMenu('apps');
            else renderClassicCategory('apps');
        }

        function renderManageAppList() {
            const list = document.getElementById('manage-app-list');
            if (!list) return;
            list.innerHTML = '';
            const customApps = safeJSONParse('goldenos_custom_apps');

            if (customApps.length === 0) {
                list.innerHTML = '<p style="opacity: 0.5; font-size: 0.9rem; text-align: center; margin-top: 20px;">Nenhum app adicionado ainda.</p>';
                return;
            }

            customApps.forEach(app => {
                const item = document.createElement('div');
                item.className = 'manage-item';

                const isBase64 = app.icon && app.icon.startsWith('data:');
                const iconSrc = isBase64 ? app.icon : (app.icon ? `icons/${app.icon}` : '');
                let iconHtml = renderSvgIcon('android');
                if (iconSrc) {
                    iconHtml = `<img src="${iconSrc}" onerror="this.outerHTML=renderSvgIcon('android')">`;
                }

                item.innerHTML = `
                    <div class="manage-item-info">
                        ${iconHtml}
                        <div class="manage-item-name">${app.name}</div>
                    </div>
                    <button class="manage-delete-btn" onclick="deleteCustomApp('${app.id}')">
                        ${renderSvgIcon('trash')}
                    </button>
                `;
                list.appendChild(item);
            });
        }

        function deleteCustomApp(id) {
            showConfirm('Remover App', 'Deseja remover este app?', () => {
                let customApps = safeJSONParse('goldenos_custom_apps');
                customApps = customApps.filter(a => a.id !== id);
                localStorage.setItem('goldenos_custom_apps', JSON.stringify(customApps));
                renderManageAppList();
                if (isDexMode) renderDexStartMenu('apps');
                else renderClassicCategory('apps');
                showToast('App removido!', 'info');
            });
        }

        // ---- Add Local Game Logic ----
        let _lastGameIconData = null;

        function openAddGameModal() {
            const modal = document.getElementById('add-game-modal');
            modal.style.display = 'flex';
            setTimeout(() => modal.classList.add('show'), 10);
            switchGameModalTab('add');
        }

        function closeAddGameModal() {
            const modal = document.getElementById('add-game-modal');
            modal.classList.remove('show');
            setTimeout(() => {
                modal.style.display = 'none';
                document.getElementById('game-name-input').value = '';
                document.getElementById('game-code-input').value = '';
                document.getElementById('game-icon-input').value = '';
                document.getElementById('game-icon-preview-container').innerHTML = '<span style="opacity: 0.3; font-size: 0.8rem;">Preview</span>';
            }, 200);
        }

        function switchGameModalTab(tab) {
            const addSec = document.getElementById('game-modal-add-section');
            const manageSec = document.getElementById('game-modal-manage-section');
            const addTabBtn = document.getElementById('game-tab-add-btn');
            const manageTabBtn = document.getElementById('game-tab-manage-btn');

            if (tab === 'add') {
                addSec.style.display = 'block';
                manageSec.style.display = 'none';
                addTabBtn.classList.add('active');
                manageTabBtn.classList.remove('active');
            } else {
                addSec.style.display = 'none';
                manageSec.style.display = 'block';
                addTabBtn.classList.remove('active');
                manageTabBtn.classList.add('active');
                renderManageGameList();
            }
        }

        function previewGameIcon(input) {
            const file = input.files[0];
            if (file) {
                resizeImage(file, 96, 2, (data) => {
                    _lastGameIconData = data;
                    document.getElementById('game-icon-preview-container').innerHTML = `<img src="${data}" style="width:100%; height:100%; object-fit:cover;">`;
                });
            }
        }

        function saveCustomGame() {
            const name = document.getElementById('game-name-input').value.trim();
            const code = document.getElementById('game-code-input').value.trim();

            if (!name || !code) {
                showToast('Por favor, preencha o nome e o código.', 'error');
                return;
            }

            const customGames = safeJSONParse('goldenos_custom_games');
            const newGame = {
                id: 'game_' + Date.now(),
                name: name,
                file: 'snippet:' + encodeURIComponent(code),
                icon: _lastGameIconData || '',
                category: 'games',
                isCustom: true
            };

            customGames.push(newGame);
            localStorage.setItem('goldenos_custom_games', JSON.stringify(customGames));

            closeAddGameModal();
            _lastGameIconData = null;

            if (isDexMode) renderDexStartMenu('games');
            else renderClassicCategory('games');
        }

        function renderManageGameList() {
            const list = document.getElementById('manage-game-list');
            if (!list) return;
            list.innerHTML = '';
            const customGames = safeJSONParse('goldenos_custom_games');

            if (customGames.length === 0) {
                list.innerHTML = '<p style="opacity: 0.5; font-size: 0.9rem; text-align: center; margin-top: 20px;">Nenhum jogo adicionado ainda.</p>';
                return;
            }

            customGames.forEach(game => {
                const item = document.createElement('div');
                item.className = 'manage-item';

                const isBase64 = game.icon && game.icon.startsWith('data:');
                const iconSrc = isBase64 ? game.icon : (game.icon ? `icons/${game.icon}` : '');
                let iconHtml = renderSvgIcon('gamepad');
                if (iconSrc) {
                    iconHtml = `<img src="${iconSrc}" onerror="this.outerHTML=renderSvgIcon('gamepad')">`;
                }

                item.innerHTML = `
                    <div class="manage-item-info">
                        ${iconHtml}
                        <span>${game.name}</span>
                    </div>
                    <button class="manage-delete-btn" onclick="deleteCustomGame('${game.id}')">
                        ${renderSvgIcon('trash')}
                    </button>
                `;
                list.appendChild(item);
            });
        }

        function deleteCustomGame(id) {
            showConfirm('Remover Jogo', 'Deseja remover este jogo?', () => {
                let customGames = safeJSONParse('goldenos_custom_games');
                customGames = customGames.filter(g => g.id !== id);
                localStorage.setItem('goldenos_custom_games', JSON.stringify(customGames));
                renderManageGameList();
                if (isDexMode) renderDexStartMenu('games');
                else renderClassicCategory('games');
                showToast('Jogo removido!', 'info');
            });
        }

        function renderClassicCategory(cat) {
            const grid = document.getElementById('grid-' + cat);
            if (!grid) return;

            // Clean custom items and placeholders first
            grid.querySelectorAll('.custom-app, .add-app-btn, .no-apps').forEach(el => el.remove());

            if (cat === 'webs') {
                const customWebs = safeJSONParse('goldenos_custom_webs');
                customWebs.forEach(web => {
                    const item = renderCustomWebItem(web);
                    grid.appendChild(item);
                });

                const addBtn = document.createElement('div');
                addBtn.className = 'app-item add-app-btn';
                addBtn.onclick = openAddWebModal;
                addBtn.innerHTML = `
                    <div class="app-icon">
                        ${renderSvgIcon('plus')}
                    </div>
                    <div class="app-name">Novo Site</div>
                `;
                grid.appendChild(addBtn);
            }

            if (cat === 'downloads') {
                const customDownloads = safeJSONParse('goldenos_custom_downloads');
                customDownloads.forEach(dl => {
                    const item = renderCustomWebItem(dl);
                    grid.appendChild(item);
                });

                const addDownloadBtn = document.createElement('div');
                addDownloadBtn.className = 'app-item add-app-btn';
                addDownloadBtn.onclick = openAddDownloadModal;
                addDownloadBtn.innerHTML = `
                    <div class="app-icon">
                        ${renderSvgIcon('plus')}
                    </div>
                    <div class="app-name">Novo Download</div>
                `;
                grid.appendChild(addDownloadBtn);
            }

            if (cat === 'games') {
                const customGames = safeJSONParse('goldenos_custom_games');
                customGames.forEach(game => {
                    const item = renderCustomWebItem(game);
                    grid.appendChild(item);
                });

                const addGameBtn = document.createElement('div');
                addGameBtn.className = 'app-item add-app-btn';
                addGameBtn.onclick = openAddGameModal;
                addGameBtn.innerHTML = `
                    <div class="app-icon">
                        ${renderSvgIcon('plus')}
                    </div>
                    <div class="app-name">Novo Jogo</div>
                `;
                grid.appendChild(addGameBtn);
            }

            if (cat === 'apps') {
                const customApps = safeJSONParse('goldenos_custom_apps');
                customApps.forEach(app => {
                    const item = renderCustomWebItem(app); // Reusing the same render function as it's identical
                    grid.appendChild(item);
                });

                const addAppBtn = document.createElement('div');
                addAppBtn.className = 'app-item add-app-btn';
                addAppBtn.onclick = openAddAppModal;
                addAppBtn.innerHTML = `
                    <div class="app-icon">
                        ${renderSvgIcon('plus')}
                    </div>
                    <div class="app-name">Novo App</div>
                `;
                grid.appendChild(addAppBtn);
            }
        }

        function renderCustomWebItem(app) {
            const div = document.createElement('div');
            div.className = 'app-item custom-app';
            div.setAttribute('data-name', app.name); // CRITICAL for filtering

            const isBase64 = app.icon && app.icon.startsWith('data:');
            const iconSrc = isBase64 ? app.icon : (app.icon ? `icons/${app.icon}` : '');

            let defaultIcon = app.category === 'webs' ? 'link' : (app.category === 'games' ? 'gamepad' : 'android');
            let iconHtml = renderSvgIcon(defaultIcon, 'fa-icon-large');
            if (iconSrc) {
                iconHtml = `<img src="${iconSrc}" onerror="this.outerHTML=renderSvgIcon('${defaultIcon}', 'fa-icon-large')">`;
            }

            div.innerHTML = `
                <div class="app-icon">
                    ${iconHtml}
                </div>
                <div class="app-name">${app.name}</div>
            `;

            // Safe event listener to avoid quote issues
            div.querySelector('.app-icon').onclick = (e) => {
                e.stopPropagation();
                openApp(app.file, app.name, app.icon);
            };

            div.onclick = () => {
                openApp(app.file, app.name, app.icon);
            };
            return div;
        }

        function loadCustomWebsClassic() {
            renderClassicCategory('webs');
            renderClassicCategory('apps');
            renderClassicCategory('games');
            renderClassicCategory('downloads');
        }

        // ---- Add Local Download Logic ----
        let _lastDownloadIconData = null;

        function openAddDownloadModal() {
            const modal = document.getElementById('add-download-modal');
            modal.style.display = 'flex';
            setTimeout(() => modal.classList.add('show'), 10);
            switchDownloadModalTab('add');
        }

        function closeAddDownloadModal() {
            const modal = document.getElementById('add-download-modal');
            modal.classList.remove('show');
            setTimeout(() => {
                modal.style.display = 'none';
                document.getElementById('download-name-input').value = '';
                document.getElementById('download-url-input').value = '';
                document.getElementById('download-icon-input').value = '';
                document.getElementById('download-icon-preview-container').innerHTML = '<span style="opacity: 0.3; font-size: 0.8rem;">Preview</span>';
            }, 200);
        }

        function switchDownloadModalTab(tab) {
            const addSec = document.getElementById('download-modal-add-section');
            const manageSec = document.getElementById('download-modal-manage-section');
            const addTabBtn = document.getElementById('download-tab-add-btn');
            const manageTabBtn = document.getElementById('download-tab-manage-btn');

            if (tab === 'add') {
                addSec.style.display = 'block';
                manageSec.style.display = 'none';
                addTabBtn.classList.add('active');
                manageTabBtn.classList.remove('active');
            } else {
                addSec.style.display = 'none';
                manageSec.style.display = 'block';
                addTabBtn.classList.remove('active');
                manageTabBtn.classList.add('active');
                renderManageDownloadList();
            }
        }

        function previewDownloadIcon(input) {
            const file = input.files[0];
            if (file) {
                resizeImage(file, 96, 2, (data) => {
                    _lastDownloadIconData = data;
                    document.getElementById('download-icon-preview-container').innerHTML = `<img src="${data}" style="width:100%; height:100%; object-fit:cover;">`;
                });
            }
        }

        function saveCustomDownload() {
            const name = document.getElementById('download-name-input').value.trim();
            const url = document.getElementById('download-url-input').value.trim();

            if (!name || !url) {
                showToast('Por favor, preencha o nome e o link.', 'error');
                return;
            }

            const customDownloads = safeJSONParse('goldenos_custom_downloads');
            const newDownload = {
                id: 'dl_' + Date.now(),
                name: name,
                file: url,
                icon: _lastDownloadIconData || '',
                category: 'downloads',
                isCustom: true
            };

            customDownloads.push(newDownload);
            localStorage.setItem('goldenos_custom_downloads', JSON.stringify(customDownloads));

            closeAddDownloadModal();
            _lastDownloadIconData = null;

            renderClassicCategory('downloads');
        }

        function renderManageDownloadList() {
            const list = document.getElementById('manage-download-list');
            if (!list) return;
            list.innerHTML = '';
            const customDownloads = safeJSONParse('goldenos_custom_downloads');

            if (customDownloads.length === 0) {
                list.innerHTML = '<p style="opacity: 0.5; font-size: 0.9rem; text-align: center; margin-top: 20px;">Nenhum download adicionado ainda.</p>';
                return;
            }

            customDownloads.forEach(dl => {
                const item = document.createElement('div');
                item.className = 'manage-item';

                const isBase64 = dl.icon && dl.icon.startsWith('data:');
                const iconSrc = isBase64 ? dl.icon : (dl.icon ? `icons/${dl.icon}` : '');
                let iconHtml = renderSvgIcon('download');
                if (iconSrc) {
                    iconHtml = `<img src="${iconSrc}" onerror="this.outerHTML=renderSvgIcon('download')">`;
                }

                item.innerHTML = `
                    <div class="manage-item-info">
                        ${iconHtml}
                        <div class="manage-item-name">${dl.name}</div>
                    </div>
                    <button class="manage-delete-btn" onclick="deleteCustomDownload('${dl.id}')">
                        ${renderSvgIcon('trash')}
                    </button>
                `;
                list.appendChild(item);
            });
        }

        function deleteCustomDownload(id) {
            showConfirm('Remover Download', 'Deseja remover este download?', () => {
                let customDownloads = safeJSONParse('goldenos_custom_downloads');
                customDownloads = customDownloads.filter(d => d.id !== id);
                localStorage.setItem('goldenos_custom_downloads', JSON.stringify(customDownloads));
                renderManageDownloadList();
                renderClassicCategory('downloads');
                showToast('Download removido!', 'info');
            });
        }

        function updateSmartMinimize(enabled) {
            localStorage.setItem('goldenos_smart_minimize', enabled);
        }

        function updateSmartResize(enabled) {
            localStorage.setItem('goldenos_smart_resize', enabled);
        }

        function updateSmartEdges(enabled) {
            localStorage.setItem('goldenos_smart_edges', enabled);
        }

        function updateSmartTrash(enabled) {
            localStorage.setItem('goldenos_smart_trash', enabled);
            renderDexDesktop(); // Refresh visibility
        }

        function loadDexTraySettings() {
            const types = ['time', 'calendar', 'ping', 'music'];
            types.forEach(type => {
                const saved = localStorage.getItem(`goldenos_dex_tray_${type}`);
                const visible = saved === null ? true : (saved === 'true');

                // Update UI toggle
                const toggle = document.getElementById(`dex-tray-${type}-toggle`);
                if (toggle) toggle.checked = visible;

                // Update Tray
                const el = document.getElementById(`dex-tray-${type}`);
                if (el) el.style.display = visible ? 'flex' : 'none';
            });

            // Smart settings initialization
            const savedSmartMin = localStorage.getItem('goldenos_smart_minimize');
            const smartMinEnabled = savedSmartMin === null ? true : (savedSmartMin === 'true');
            const smartMinToggle = document.getElementById('dex-smart-minimize-toggle');
            if (smartMinToggle) smartMinToggle.checked = smartMinEnabled;

            const savedSmartRes = localStorage.getItem('goldenos_smart_resize');
            const smartResEnabled = savedSmartRes === null ? true : (savedSmartRes === 'true');
            const smartResToggle = document.getElementById('dex-smart-resize-toggle');
            if (smartResToggle) smartResToggle.checked = smartResEnabled;

            const savedSmartEdges = localStorage.getItem('goldenos_smart_edges');
            const smartEdgesEnabled = savedSmartEdges === null ? true : (savedSmartEdges === 'true');
            const smartEdgesToggle = document.getElementById('dex-smart-edges-toggle');
            if (smartEdgesToggle) smartEdgesToggle.checked = smartEdgesEnabled;

            const savedSmartTrash = localStorage.getItem('goldenos_smart_trash');
            const smartTrashEnabled = savedSmartTrash === 'true'; // false by default
            const smartTrashToggle = document.getElementById('dex-smart-trash-toggle');
            if (smartTrashToggle) smartTrashToggle.checked = smartTrashEnabled;
        }


        // ---- Backup (Export/Import) Logic ----
        function exportData() {
            const backup = {};
            const keys = Object.keys(localStorage);

            // Only export GoldenOS related data
            keys.forEach(key => {
                if (key.startsWith('goldenos_')) {
                    backup[key] = localStorage.getItem(key);
                }
            });

            if (Object.keys(backup).length === 0) {
                showToast('Nenhum dado do GoldenOS encontrado para exportar.', 'error');
                return;
            }

            const dataStr = JSON.stringify(backup, null, 2);
            const blob = new Blob([dataStr], { type: 'application/json' });
            const url = URL.createObjectURL(blob);

            const link = document.createElement('a');
            link.href = url;
            link.download = `goldenos_backup_${new Date().toISOString().slice(0, 10)}.json`;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            URL.revokeObjectURL(url);
        }

        function importData(input) {
            const file = input.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = (e) => {
                try {
                    const backup = JSON.parse(e.target.result);

                    showConfirm('Importar Backup', 'Esta ação irá substituir todos os dados atuais. Deseja continuar?', () => {
                        // Clear old goldenos_ keys first to avoid clutter
                        Object.keys(localStorage).forEach(key => {
                            if (key.startsWith('goldenos_')) {
                                localStorage.removeItem(key);
                            }
                        });

                        // Apply new data
                        Object.entries(backup).forEach(([key, value]) => {
                            if (key.startsWith('goldenos_')) {
                                localStorage.setItem(key, value);
                            }
                        });

                        showToast('Backup restaurado com sucesso! A página será recarregada.', 'success');
                        setTimeout(() => window.location.reload(), 1000);
                    });
                } catch (err) {
                    console.error('Erro ao importar backup:', err);
                    showToast('Erro ao processar o arquivo de backup. Verifique se o formato está correto.', 'error');
                }
            };
            reader.readAsText(file);
        }

    </script>

    <div id="toast-container"></div>

    <!-- Confirm Modal -->
    <div id="confirm-modal" class="modal">
        <div class="modal-content">
            <h3 id="confirm-title" style="color: var(--gold); margin-bottom: 15px;">Confirmar</h3>
            <p id="confirm-message" style="margin-bottom: 20px; line-height: 1.5; opacity: 0.9;">Tem certeza?</p>
            <div class="confirm-buttons">
                <button class="confirm-btn-no" onclick="handleConfirmAction(false)">Cancelar</button>
                <button class="confirm-btn-yes" onclick="handleConfirmAction(true)">Sim, Confirmar</button>
            </div>
        </div>
    </div>
</body>

</html>
