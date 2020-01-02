<link rel="stylesheet" href="/css/jquery-ui.min.css">


<script src="/js/jquery.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script>
    $(function() {
        $( "#sortable" ).sortable({

            update: function (event, ui) {

                var items = $(this).sortable('serialize');

                _token = '<?=csrf_token()?>';
            }});

        $('.js-save').click(function(){

            var items = $( "#sortable").sortable('serialize');

            $.ajax({
                data: items,
                type: 'get',
                url: '/<?=$type?>/<?=$item->id?>/images/update/',
                dataType: 'json'
            });

            window.location.href = '/admin/<?=$type?>/<?=$item->id?>/edit';
        });
    });


</script>


<div class="form-group form-element-images ">
    <label for="images" class="control-label">
        Фотографии
    </label>

    <div class="form-element-files dropzone clearfix">
        <div id="sortable">
            @foreach ($item->images as $image)
                <div class="form-element-files__item" id="item-{!! $loop->index !!}">
                    @if($image[0]!='/')
                        <a class="form-element-files__image" data-toggle="images" href="/{!! $image !!}">
                            <img src="/{!! $image !!}">
                        </a>
                    @else
                        <a class="form-element-files__image" data-toggle="images" href="{!! $image !!}">
                            <img src="{!! $image !!}">
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <button class="btn btn-success js-save">СОХРАНИТЬ</button>
</div>
