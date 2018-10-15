# Namų darbai - užduotis nr. 2
## Su strict_type ir type hint
### Pliusai
- Skaitomesnis kodas
- Mažesnė klaidų tikimybė dėl kintamųjų, kurių tipas yra nenumatytas
    - Funkcijai nebus perduotas klaidingo tipo kintamasis
    - Funkcija grąžins tokį kintamojo tipą, koks bus nurodytas, kitu atveju 
bus pranešama apie įvykusią klaidą (implicit conversion)
-  Leidžia kontroliuoti kodą
### Minusai
- Reikalauja daugiau pastangų (kadangi reikia apgalvoti visas galimybes,
kad funkcija būtų labiau dinamiška)
## Be strict_type ir type hint
### Pliusai
-  Reikalauja mažiau pastangų, kadangi nenurodant kintamųjų tipų funkcijos
būna dinamiškesnės
### Minusai
- Sunkiau skaitomas kodas (neaiškūs kintamųjų tipai)
- Didesnė klaidų tikimybė (gali būti perduotas kintamasis su klaidingu tipu)
- Ilgam laiko tarpui, palaikyti kodą tampa sunkiau (laikui einant prisideda naujų 
patikrinimų, pavyzdžiui, if sąlygos, tikrinančios kintamojo tipą)
## Išvados
Strict_type (su hint typing) yra geresnis sprendimas kurti aukštos kokybės kodą, dėl minėtų
privalumų 
