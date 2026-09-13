@extends('admin.layouts.app')
@section('title','Contact Messages')
@section('breadcrumb','Contact Messages')
@section('content')
<div class="mb-4"><h1 class="h3 mb-1">Contact Messages</h1><p class="text-muted mb-0">Review enquiries submitted through the public portfolio.</p></div>
<div class="card shadow-sm"><div class="table-responsive"><table class="table table-hover align-middle mb-0"><thead><tr><th>Name</th><th>Email</th><th>Subject</th><th>Status</th><th>Date</th><th class="text-end">Action</th></tr></thead><tbody>
@forelse($messages as $message)<tr><td class="fw-semibold">{{ $message->name }}</td><td>{{ $message->email }}</td><td>{{ $message->subject ?: '—' }}</td><td><span class="badge {{ ['new'=>'text-bg-primary','read'=>'text-bg-info','replied'=>'text-bg-success','archived'=>'text-bg-secondary'][$message->status] ?? 'text-bg-secondary' }}">{{ ucfirst($message->status) }}</span></td><td>{{ $message->created_at?->format('M j, Y h:i A') }}</td><td class="text-end"><a href="{{ route('admin.messages.show',$message) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></a><form method="POST" action="{{ route('admin.messages.destroy',$message) }}" class="d-inline" onsubmit="return confirm('Delete this message?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></form></td></tr>@empty<tr><td colspan="6" class="text-center py-5 text-muted">No messages yet.</td></tr>@endforelse</tbody></table></div><div class="card-footer">{{ $messages->links() }}</div></div>
@endsection
