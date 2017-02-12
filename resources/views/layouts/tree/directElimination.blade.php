<?php
$directEliminationTree = $championship->tree->map(function ($item, $key) use ($championship) {
    if ($championship->category->isTeam()){

        $fighter1 = $item->team1 != null ? $item->team1->name : "Bye";
        $fighter2 = $item->team2 != null ? $item->team2->name : "Bye";
    }else{
        $fighter1 = $item->competitors[0] != null ? $item->competitor[0]->user->name : "Bye";
        $fighter2 = $item->competitors[1] != null ? $item->competitor[1]->user->name : "Bye";
    }//    dump([$user1, $user2]);
    return [$fighter1, $fighter2];
})->toArray();
?>
@if (Request::is('championships/'.$championship->id.'/pdf'))
    <h1> {{$championship->category->buildName()}}</h1>
@endif

<div id="brackets_{{ $championship->id }}"></div>
<script>
    var minimalData_{{ $championship->id }} = {!!     json_encode([ 'teams' => $directEliminationTree ] ) !!};
</script>
