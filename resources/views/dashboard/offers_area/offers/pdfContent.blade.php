<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>{{$offer->name}}</title>
  <style>


    @page {
      margin: 0;
    }

    .content0 {
        position: absolute;
        width: 440px;
        padding-top: 990px;
        font-size: 24pt;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
        border-radius: 50%;
    }

    .content1 {
        padding-top: 300px;
        font-size: 12pt;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 10px;
    }







    table {
        border-radius: 10px;
        background-color: rgba(172, 195, 227,0.3);
        border: 1px solid rgba(172, 195, 227,0.0);
        color: #243c5a;
        border-collapse: collapse;
        margin: 0 auto;
        width: 80%;
        border-radius: 10px;
    }

    th, td {
        padding: 12px;
        border: 1px solid rgba(172, 195, 227,0.0);
        color: #243c5a;
        text-align: center;
    }

    .grid-list {
    border-collapse: collapse;
    width: 70%;
    float: right;
}

.grid-list td {
    padding: 8px;
    opacity: 0.5;
    border: none;
}
  </style>
</head>
<body>

    <div class="page-background" style="background-image: url('global_images/{{$bg_img}}');
        background-size: cover;
        background-repeat: no-repeat;
        height: 3508px;
        width:2480px;">

        <div class="content0">
            <p style="background-color: rgba(255, 255, 255, 0.7); border-radius: 50%;"> سعر البكج الإجمالي : {{$offer->cost->cost}} ريال </p>
        </div>
    </div>
@foreach ($offer->pages as $page)
<div class="page-background" style="background-image: url('cities_images/@if($page->travel_type == 0){{$page->city->bg_img}}@else{{$page->city->bg_img_train}}@endif');
    background-size: cover;
    background-repeat: no-repeat;
    height: 3508px;
    width:2480px;">

    <div class="content1">
        <table  dir="rtl">
            <tr>
                <th>الفندق</th>
                <th>الليالي</th>
                <th>النوع</th>
                <th>الدخول</th>
                <th>الوجبات</th>
            </tr>
            @foreach ($page->details as $data)
                <tr>
                    <td>{{$data->hotels[0]->name}}</td>
                    <td>{{$data->nights}}</td>
                    <td>{{$data->room->name}}</td>
                    <td>{{$data->entry_date}}</td>
                    <td>{{$data->meal->name}}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="content2">
        <table class="grid-list" style="direction: rtl;">
            @php
                $details = explode(',', $page->details_ids);
                $count = 0;
            @endphp

            @foreach ($details as $data)
                @php
                    $detail = \App\Models\Detail::where('id', $data)->first();
                @endphp

                @if ($count % 3 == 0)
                    <tr>
                @endif
                <td> &#10003;  {{$detail->name}}</td>
                @php
                    $count++;
                @endphp
                @if ($count % 3 == 0)
                    </tr>
                @endif
            @endforeach
        </table>


    </div>
</div>
@endforeach

</body>
</html>
