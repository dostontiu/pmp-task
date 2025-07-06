<h1>Hello, {{ $task->assignedUser?->name }}!</h1>
<p>You have new task:</p>
<p><strong>{{ $task->name }}</strong></p>
<p>Description: {{ $task->description }}</p>
