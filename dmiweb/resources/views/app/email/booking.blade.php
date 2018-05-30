<div style="max-width:700px; margin:0 auto; box-shadow:0 0 10px rgba(0,0,0,0.4); border-radius:10px; overflow:hidden;">
      <div style="font-family:arial; font-size:14px; padding:20px 30px; text-align:center;">
        <img src="http://distributormotor.com/images/xlogo.png.pagespeed.ic.FR8r02mJb7.webp" alt="LOGO" width="150" />
      </div>
      <div style="font-family:arial; font-size:14px; padding:30px; background:#f1f1f1; color:#333; text-align:left;">
            <p style="font-weight:normal; font-size:14px;  color:#333; border-bottom: solid 1px #ccc; padding: 10px 0; margin: 0;">
              <strong>Product :</strong> <br>
              {{$reservation->product->title}}
            </p>
            <p style="font-weight:normal; font-size:14px;  color:#333; border-bottom: solid 1px #ccc; padding: 10px 0; margin: 0;">
              <strong>Price :</strong> <br>
              {{$reservation->product->price}}
            </p>
            <p style="font-weight:normal; font-size:14px;  color:#333; border-bottom: solid 1px #ccc; padding: 10px 0; margin: 0;">
              <strong>Qty :</strong> <br>
              {{$reservation->qty}}
            </p>
            <p style="font-weight:normal; font-size:14px;  color:#333; border-bottom: solid 1px #ccc; padding: 10px 0; margin: 0;">
              <strong>From :</strong> <br>
              {{$reservation->name}}
            </p>
            <p style="font-weight:normal; font-size:14px;  color:#333; border-bottom: solid 1px #ccc; padding: 10px 0; margin: 0;">
              <strong>Email :</strong> <br>
              {{$reservation->email}}
            </p>
            <p style="font-weight:normal; font-size:14px;  color:#333; border-bottom: solid 1px #ccc; padding: 10px 0; margin: 0;">
              <strong> Phone :</strong> <br>
              {{$reservation->phone}}
            </p>
            <p style="font-weight:normal; font-size:14px;  color:#333; border-bottom: solid 1px #ccc; padding: 10px 0; margin: 0;">
              <strong> Domisili :</strong> <br>
                {!!$reservation->domisili->title!!}  -  Rp. {{number_format($reservation->domisili->value)}}
            </p>
            <p style="font-weight:normal; font-size:14px;  color:#333; border-bottom: solid 1px #ccc; padding: 10px 0; margin: 0;">
              <strong>Address :</strong> <br>
              {!!$reservation->address!!}
            </p>
            <p style="font-weight:normal; font-size:14px;  color:#333; padding: 10px 0; margin: 0;">
              <strong>KTP :</strong> <br>
              @if (!is_null($reservation->ktp))
                <a href="{{url('/')}}/uploads/ktp/{{$reservation->ktp}}" target="_blank">
                    <img src="{{url('/')}}/uploads/ktp/{{$reservation->ktp}}" alt="" width="100">
                </a>
              @endif  
            </p>
            <p style="font-weight:normal; font-size:14px;  color:#333; padding: 10px 0; margin: 0;">
              <strong>NPWP :</strong> <br>
              @if (!is_null($reservation->npwp))
                <a href="{{url('/')}}/uploads/npwp/{{$reservation->npwp}}" target="_blank">
                    <img src="{{url('/')}}/uploads/npwp/{{$reservation->npwp}}" alt="" width="100">
                </a>
              @endif  
            </p>
      </div>
  </div>
