<?php
use Collective\Html\HtmlFacade;
use Collective\Html\FormFacade;

HtmlFacade::macro('modalOpen', function($id,$title)
{
    return '<div class="modal fade" id="'.$id.'" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">'.$title.'</h4>
                                </div>';
});

HtmlFacade::macro('modalClose', function()
{
    return '</div></div></div>';
});

HtmlFacade::macro('panelOpen', function($id, $title, $params)
{
    $paramsString = '';
    $class = '';

    foreach ($params as $key => $value)
    {
        if($key=='class')
        {
            $class = 'panel panel-default '.$value;
        }
        else
        {
            $paramsString = $paramsString." ".$key.' = "'.$value.'"';
        }
    }

    if($class == '')
    {
        $class = 'panel panel-default';
    }

    if($id == null)
    {
        $id = "";
    }

    return '<div class="'.$class.'" '.$paramsString.' data-toggle="modal" data-target="#modal-liste-update">
                <div class="panel-heading">
                    <h3 class="panel-title">'.$title.'</h3>
                </div>';
});

HtmlFacade::macro('panelClose', function()
{
    return '</div>';
});

FormFacade::macro('checkboxInsert', function($name,$id, $text)
{
    if($name==null)
    {
        $name = '';
    }
    if($id==null)
    {
        $id = '';
    }
    if($text==null)
    {
        $text = '';
    }
    return '<div class="checkbox">
                <label>
                    <input id="'.$id.'" name="'.$name.'" type="checkbox"> '.$text.'</label>
            </div>';

});

FormFacade::macro('spinner', function($name, $defaultValue, $params)
{
    $paramsString = '';
    $defaultMin = '';
    $defaultMax = '';
    $defaultStep = '';

    foreach ($params as $key => $value)
    {
        if($key=='value')
        {
            $defaultValue = $value;
        }
        else if($key=='min')
        {
            $defaultMin = $value;
        }
        else if($key=='max')
        {
            $defaultMax = $value;
        }
        else if($key=='step')
        {
            $defaultStep = $value;
        }

        $paramsString = $paramsString." ".$key.' = "'.$value.'"';
    }

    if($defaultValue!=null)
    {
        $paramsString = $paramsString.' value="'.$defaultValue.'"';
    }

    if($defaultMin=='')
    {
        $defaultMin = 0;
        $paramsString = $paramsString.' min="'.$defaultMin.'"';
    }
    if($defaultMax=='')
    {
        $defaultMax = 100;
        $paramsString = $paramsString.' max="'.$defaultMax.'"';
    }
    if($defaultStep=='')
    {
        $defaultStep = 1;
        $paramsString = $paramsString.' step="'.$defaultStep.'"';
    }

    return '<div class="input-group spinner" style="width:100%; margin-bottom:15px;">
    <input name="'.$name.'" type="text" pattern="[0-9]*" data-oldvalue="'.$defaultValue.'" onchange="var max = parseInt($(this).attr(\'max\')); var min = parseInt($(this).attr(\'min\')); var oldValue = $(this).attr(\'data-oldvalue\'); var value = $(this).val(); if(/^\d+$/.test(value)==false||value>max||value<min){$(this).val(oldValue)}else{$(this).attr(\'data-oldvalue\',value);$(this).val(parseInt(value))}" '.$paramsString.'>
    <div class="input-group-btn-vertical" style="width:30px; position: relative;white-space: nowrap;vertical-align: middle;display: table-cell;">
      <button style ="border-left:none;font-size:62.5%;border-radius: 0; border-bottom:none;border-top-right-radius: 4px;display: block;float: none;height: 50%;width: 100%;max-width: 100%;margin-left: -1%;position: absolute;top:0;" class="btn btn-xs btn-default" type="button"       onclick="var $input = $(this).parent().parent().children(\':first-child\'); var oldValue = parseInt($input.attr(\'data-oldvalue\')); var value = parseInt($input.val()); var pas = parseInt($input.attr(\'step\')); var max = parseInt($input.attr(\'max\')); if(value + pas <=100){$input.val(value + pas); $input.attr(\'data-oldvalue\',value + pas);}"><i class="glyphicon glyphicon-triangle-top" style="vertical-align:middle;display:block;position:initial;line-height:100%"></i></button>
      <button style ="border-left:none;font-size:62.5%;border-radius: 0; border-bottom-right-radius: 4px;display: block;float: none;height: 50%;width: 100%;max-width: 100%;margin-left: -1%;position: absolute;bottom:0;" class="btn btn-xs btn-default" type="button"                    onclick="var $input = $(this).parent().parent().children(\':first-child\'); var oldValue = parseInt($input.attr(\'data-oldvalue\')); var value = parseInt($input.val()); var pas = parseInt($input.attr(\'step\')); var min = parseInt($input.attr(\'min\')); if(value - pas >=0)  {$input.val(value - pas); $input.attr(\'data-oldvalue\',value - pas);}"><i class="glyphicon glyphicon-triangle-bottom" style="vertical-align:middle;display:block; position:initial;line-height:100%"></i></button>
    </div>
  </div>';
});