<div class="box is-success">
    <article class="media">
        <div class="media-content">
            <div class="content">
                <p>
                    <strong>{{$shift->employee->first_name." ".$shift->employee->last_name}}</strong>
                    @if($shift->open == true)

                        <strong>Status: Open</strong>
                    @else

                        <strong>Status: Closed</strong>

                    @endif
                </p>
            </div>
            <nav class="level is-mobile">
                <div class="level-left">
                    <a class="level-item">
                        <span class="icon is-small"><i class="fa fa-edit"></i></span>
                    </a>
                    <a class="level-item">
                        <span class="icon is-small"><i class="fa fa-clock-o"></i></span>
                    </a>
                    <a class="level-item">
                        <span class="icon is-small"><i class="fa fa-trash"></i></span>
                    </a>
                </div>
            </nav>
        </div>
    </article>
</div>