{include file="header.tpl"}

<body>
    {if $username}
        <h1>Bienvenido {$username}!</h1>
    {else}
        <h1>Bienvenido!</h1>
    {/if}
    <h2>Conoce nuestro país, a traves de AereoExpress</h2>
    <div class="container-img-airport">
        {foreach $airport as $airportItem}
            <h2>{$airportItem->ubication}</h2>
            <h3>Aeropuerto: {$airportItem->name}</h3>
            <td><img class="img-airport" src={$airportItem->image}></img></td>
            </>
        {/foreach}
    </div>
</body>