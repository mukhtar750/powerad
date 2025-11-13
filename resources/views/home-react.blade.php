<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PowerAD • New Homepage (React)</title>
    @viteReactRefresh
    @vite(['resources/js/home.tsx'])
  </head>
  <body class="min-h-screen bg-[#0a0a1a]">
    <div id="root"></div>
  </body>
</html>