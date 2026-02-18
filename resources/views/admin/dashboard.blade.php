<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin_dashboard.css') }}">
    <style>
        /* Simple active link highlighting */
        .sidebar a.active {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Dashboard</h2>
        <a onclick="showSection('home')" class="active">Home</a>
        <a onclick="showSection('contacts')">Contact Us</a>
        <a onclick="showSection('testimonials')">Testimonials</a>
        <a onclick="showSection('blogs')">Blogs</a>
        <a onclick="showSection('ceo')">CEO</a>
        <a onclick="showSection('our-team')">Our Team</a>
        <a href="{{ route('admin.logout') }}">Logout</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- HOME SECTION -->
        <div id="home" class="section active">
            <img src="{{ asset('image/oz.webp') }}" alt="Logo">
        </div>

        <!-- CONTACT US SECTION -->
        <div id="contacts" class="section">
            <h2>Contact Us</h2>
            <div class="contact-container">
                <table class="contact-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>WhatsApp</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Sent At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->whatsapp }}</td>
                            <td>{{ $contact->subject }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>{{ $contact->created_at->format('d M Y, H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.contact.delete', $contact->id) }}"
                                   onclick="return confirm('Are you sure you want to delete this contact?');"
                                   style="color: red;">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- TESTIMONIALS -->
        <div id="testimonials" class="section">
            <div class="testimonial-wrapper">
                <div class="testimonial-form">
                    <h2>Add Testimonial</h2>
                    @if(session('success'))
                        <p style="color:green">{{ session('success') }}</p>
                    @endif
                    <form action="{{ route('admin.testimonial.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name" placeholder="Client Name" required>
                        <input type="file" name="image" required>
                        <textarea name="message" placeholder="Client message..." required></textarea>
                        <button type="submit">Add Testimonial</button>
                    </form>
                </div>

                <h3 style="margin-bottom:15px;">All Testimonials</h3>
                <div class="testimonial-grid">
                    @foreach($testimonials as $t)
                        <div class="testimonial-card">
                            <img src="{{ asset('uploads/testimonials/'.$t->image) }}">
                            <h4>{{ $t->name }}</h4>
                            <p>{{ $t->message }}</p>
                            <a href="{{ route('admin.testimonial.delete', $t->id) }}" onclick="return confirm('Delete testimonial?')">Delete</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- BLOGS -->
        <div id="blogs" class="section">
            <h2>Manage Blogs</h2>
            @if(session('success'))
                <p style="color:green">{{ session('success') }}</p>
            @endif

            <!-- Add Blog -->
            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data" style="max-width:500px; background:#f9f9f9; padding:20px; border-radius:8px;">
                @csrf
                <label>Title</label><br>
                <input type="text" name="title" required style="width:100%; padding:8px"><br><br>
                <label>Image</label><br>
                <input type="file" name="image" required><br><br>
                <label>Content</label><br>
                <textarea name="content" rows="5" required style="width:100%; padding:8px"></textarea><br><br>
                <button type="submit" style="padding:10px 20px;">Add Blog</button>
            </form>

            <hr style="margin:30px 0">

            <!-- All Blogs -->
            <h3>All Blogs</h3>
            <div style="display:grid; grid-template-columns: repeat(auto-fill,minmax(250px,1fr)); gap:20px;">
                @foreach($blogs as $blog)
                <div style="border:1px solid #ddd; padding:15px; border-radius:8px;">
                    <img src="{{ asset('uploads/blogs/'.$blog->image) }}" style="width:100%; height:150px; object-fit:cover; border-radius:6px">
                    <h4>{{ $blog->title }}</h4>
                    <a href="{{ route('admin.blog.delete', $blog->id) }}" onclick="return confirm('Delete this blog?')" style="color:red">Delete</a>
                </div>
                @endforeach
            </div>
        </div>

        <!-- CEO SECTION -->
      <div id="ceo" class="section">
    <h2>Manage CEO Info</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <div style="display:flex; flex-wrap:wrap; gap:30px; background:#f9f9f9; padding:20px; border-radius:8px;">

        <!-- Left side: Forms -->
        <div style="flex:1; min-width:250px;">

            <!-- Update CEO Name & Message -->
            <form action="{{ route('admin.ceo.info') }}" method="POST" style="margin-bottom:20px;">
                @csrf
                <div style="margin-bottom:10px;">
                    <label>CEO Name</label>
                    <input type="text" name="name" value="{{ $ceo->name ?? '' }}" required
                           style="width:100%; padding:6px; border-radius:4px; border:1px solid #ccc;">
                </div>
                <div style="margin-bottom:10px;">
                    <label>CEO Message</label>
                    <textarea name="message" rows="4" required
                              style="width:100%; padding:6px; border-radius:4px; border:1px solid #ccc;">{{ $ceo->message ?? '' }}</textarea>
                </div>
                <button type="submit" style="padding:6px 12px; border:none; background:#4CAF50; color:white; border-radius:4px;">Update Info</button>
            </form>

            <!-- Upload / Replace CEO Image -->
            <form action="{{ route('admin.ceo.update.image') }}" method="POST" enctype="multipart/form-data" style="margin-bottom:10px;">
                @csrf
                <label>CEO Photo</label><br>
                <input type="file" name="photo" required style="margin:5px 0;"><br>
                <button type="submit" style="padding:6px 12px; border:none; background:#2196F3; color:white; border-radius:4px;">Upload Image</button>
            </form>

            <!-- Delete CEO Image -->
            @php
                $ceoImage = public_path('ceo/ceo.jpg');
            @endphp

            @if(file_exists($ceoImage))
                <form action="{{ route('admin.ceo.delete.image') }}" method="POST" style="margin-top:5px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="padding:5px 10px; border:none; background:red; color:white; border-radius:4px;"
                            onclick="return confirm('Delete CEO image?');">Delete Image</button>
                </form>
            @endif

        </div>

        <!-- Right side: CEO Image Preview -->
        <div style="flex:0 0 150px; display:flex; justify-content:center; align-items:flex-start;">
            @if(file_exists($ceoImage))
                <img src="{{ asset('ceo/ceo.jpg') }}?v={{ time() }}" alt="CEO Image"
                     style="width:150px; height:150px; object-fit:cover; border-radius:50%; border:1px solid #ccc;">
            @endif
        </div>

    </div>
</div>



        <!-- OUR TEAM SECTION -->
        <div id="our-team" class="section">
            <h2>Manage Our Team</h2>

            <!-- Add Team Member Form -->
            <div style="margin-bottom:30px;">
                <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data" style="max-width:500px; background:#f9f9f9; padding:20px; border-radius:8px;">
                    @csrf
                    <label>Name</label><br>
                    <input type="text" name="name" required style="width:100%; padding:8px; margin-bottom:10px;"><br>

                    <label>Image</label><br>
                    <input type="file" name="image" required style="margin-bottom:10px;"><br>

                    <button type="submit" style="padding:10px 20px;">Add Team Member</button>
                </form>
            </div>

            <hr>

            <!-- List of Existing Team Members -->
            <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(200px,1fr)); gap:15px;">
                @foreach($teamMembers as $member)
                    <div style="border:1px solid #ccc; padding:10px; text-align:center; border-radius:6px;">
                        <img src="{{ asset('uploads/team/'.$member->image) }}" style="width:100%; height:150px; object-fit:cover; border-radius:6px;">
                        <p style="margin:10px 0; font-weight:bold;">{{ $member->name }}</p>
                        <a href="{{ route('admin.team.edit', $member->id) }}">Edit</a> |
                        <a href="{{ route('admin.team.delete', $member->id) }}" onclick="return confirm('Delete this member?');" style="color:red;">Delete</a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <!-- JS to switch sections -->
    <script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(sec => sec.classList.remove('active'));
            document.getElementById(sectionId).classList.add('active');

            // highlight sidebar link
            const links = document.querySelectorAll('.sidebar a');
            links.forEach(link => link.classList.remove('active'));
            links.forEach(link => {
                if(link.getAttribute('onclick') === `showSection('${sectionId}')`){
                    link.classList.add('active');
                }
            });
        }
    </script>
</body>
</html>
