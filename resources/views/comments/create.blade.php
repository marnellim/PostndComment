<x-app-layout>
    <!-- resources/views/comments/create.blade.php -->
    
    <!-- Display a form to submit a new comment -->
    <form method="POST" action="{{ route('comments.store') }}">
      @csrf
    
      <!-- Display any success or error messages -->
      @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
      @endif
    
      <!-- Name field -->
      <div>
          <label for="name">Name:</label>
          <input type="text" name="name" id="name" required>
      </div>
    
      <!-- Email field -->
      <div>
          <label for="email">Email:</label>
          <input type="email" name="email" id="email" required>
      </div>
    
      <!-- Content field -->
      <div>
          <label for="content">Content:</label>
          <textarea name="content" id="content" required></textarea>
      </div>
    
      <!-- Submit button -->
      <button type="submit">Post Comment</button>
    </form>
    
    
    </x-app-layout>