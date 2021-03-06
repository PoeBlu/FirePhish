@extends('layouts.app', ['title' => 'All Campaigns'])

@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>Campaigns</h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>List of Campaigns</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <table class="table table-striped table-bordered datatable" id="mainCampaignTable">
            <thead>
              <tr>
                <th>Campaign Name</th>
                <th>Campaign Description</th>
                <th>State</th>
                <th>Email Status</th>
                <th>Created</th>
                <th>Last Update</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($all_campaigns as $camp)
                <tr>
                  <td><a href="{{ action('CampaignController@campaign_details', ['id' => $camp->id ]) }}">{{ $camp->name }}</a></td>
                  <td>{{ $camp->description }}</td>
                  <td>{{ $camp->getStatus() }}</td>
                  <td>{{ $camp->emails()->where('status', \App\Email::SENT)->count() }} / {{ $camp->emails()->count() }} sent</td>
                  <td>{{ $camp->created_at->format('M j, Y @ g:i:s a') }}</td>
                  <td>{{ $camp->updated_at->format('M j, Y @ g:i:s a') }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
@endsection



@section('footer')
<script type="text/javascript">
/* global $ */
  $("#mainCampaignTable").dataTable();
</script>
@endsection