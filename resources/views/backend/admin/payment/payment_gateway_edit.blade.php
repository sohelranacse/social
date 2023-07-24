
<div class="main_content">
	<!-- Mani section header and breadcrumb -->
	<div class="mainSection-title">
		<div class="row">
			<div class="col-12">
				<div class="d-flex justify-content-between align-items-center flex-wrap gr-15">
					<div class="d-flex flex-column">
						<h4>{{ get_phrase('Payment gateways') }}</h4>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Start Admin area -->
	<div class="row">
		<div class="col-md-7">
			<div class="eSection-wrap-2">

	            <div class="col-md-12">

                    <h4 class="header-title mb-3"><p>{{$payment_gateway->title}} {{get_phrase('Settings')}}</p></h4>
                    <form class="" action="{{route('admin.payment_gateway.update', $payment_gateway->id)}}" method="post" enctype="multipart/form-data">
                    	@CSRF

                        <div class="form-group mb-3">
                            <label class="eForm-label">{{get_phrase('Select currency')}}</label>
                            <select class="form-control eForm-control select2" data-toggle="select2" name="currency" required>
                                <option value="">{{get_phrase('Select currency')}}</option>
                                @foreach ($currencies as $currency)
                                    <option value="{{$currency->code}}" @if ($payment_gateway->currency == $currency->code) Selected @endif>
                                        {{$currency->code}}
                                    </option>
                                @endforeach;
                            </select>
                        </div>


                        <?php foreach(json_decode($payment_gateway['keys'], true) as $key => $value): ?>
                        	<div class="form-group mb-3">
                                <?php if($key == 'theme_color'): ?>
                                    <label class="text-capitalize eForm-label">{{get_phrase(str_replace('_', ' ', $key))}}</label>
                                    <input type="color" name="<?php echo $key; ?>" class="form-control eForm-control" value="<?php echo $value;?>" required />
                                <?php else: ?>
                                        <label class="text-capitalize eForm-label">{{get_phrase(str_replace('_', ' ', $key))}}</label>
                                        <input type="text" name="<?php echo $key; ?>" class="form-control eForm-control" value="<?php echo $value;?>" required />
                                <?php endif; ?>
                        	</div>
                        <?php endforeach; ?>

                        <div class="row">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">{{get_phrase('Save changes')}}</button>
                            </div>
                        </div>
                    </form>

	            </div>
			</div>
		</div>
	</div>
</div>