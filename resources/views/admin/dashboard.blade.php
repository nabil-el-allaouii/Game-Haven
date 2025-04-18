<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - GameHaven</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --custom-color: #6366f1;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen admin-dashboard">
    <div class="flex h-screen">
        <aside class="w-64 bg-gray-900 text-white">
            <div class="p-4">
                <img src="https://ai-public.creatie.ai/gen_page/logo_placeholder.png" alt="GameHaven" class="h-8">
            </div>
            <nav class="mt-8">
                <a href="#" onclick="showSection('dashboard')"
                    class="nav-link flex items-center px-4 py-3 bg-custom text-white" data-section="dashboard">
                    <i class="fas fa-chart-line w-6"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" onclick="showSection('users')"
                    class="nav-link flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800" data-section="users">
                    <i class="fas fa-users w-6"></i>
                    <span>Users</span>
                </a>
                <a href="#" onclick="showSection('games')"
                    class="nav-link flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800" data-section="games">
                    <i class="fas fa-gamepad w-6"></i>
                    <span>Games</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800">
                    <i class="fas fa-trophy w-6"></i>
                    <span>Achievements</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-800">
                    <i class="fas fa-cog w-6"></i>
                    <span>Settings</span>
                </a>
            </nav>
        </aside>

        <main class="flex-1 overflow-y-auto">
            <!-- Dashboard Section -->
            <div id="dashboard-section" class="section-content">
                <header class="bg-white shadow">
                    <div class="px-6 py-4 flex items-center justify-between">
                        <h1 class="text-2xl font-semibold text-gray-900">Dashboard Overview</h1>
                        <div class="flex items-center space-x-4">
                            <a href="/add-game">
                                <button class="!rounded-button bg-custom text-white px-4 py-2 cursor-pointer">
                                    <i class="fas fa-plus mr-2"></i>Add New Game
                                </button></a>
                            <div class="relative">
                                <img class="h-10 w-10 rounded-full"
                                    src="https://creatie.ai/ai/api/search-image?query=A professional headshot of a person wearing business attire against a neutral background, suitable for an admin profile picture&width=80&height=80&orientation=squarish&flag=6b42798b-299a-453a-bddb-081d907c65e5"
                                    alt="Admin">
                            </div>
                        </div>
                    </div>
                </header>

                <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full"
                                style="background-color: rgba(99, 102, 241, 0.1); color: var(--custom-color);">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-sm font-medium text-gray-500">Total Users</h2>
                                <p class="text-2xl font-semibold text-gray-900">24,892</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <i class="fas fa-user-check text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-sm font-medium text-gray-500">Active Today</h2>
                                <p class="text-2xl font-semibold text-gray-900">1,234</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                                <i class="fas fa-gamepad text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-sm font-medium text-gray-500">Total Games</h2>
                                <p class="text-2xl font-semibold text-gray-900">412</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                <i class="fas fa-user-plus text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-sm font-medium text-gray-500">New Users (24h)</h2>
                                <p class="text-2xl font-semibold text-gray-900">89</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-2 bg-white rounded-lg shadow">
                        <div class="p-6">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">User Activity</h2>
                            <div id="activityChart" style="height: 300px;"></div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-6">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h2>
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <div
                                        class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                        <i class="fas fa-user-plus text-sm"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">New user registered</p>
                                        <p class="text-xs text-gray-500">2 minutes ago</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div
                                        class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                        <i class="fas fa-gamepad text-sm"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">New game added</p>
                                        <p class="text-xs text-gray-500">15 minutes ago</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div
                                        class="w-8 h-8 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600">
                                        <i class="fas fa-exclamation-triangle text-sm"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">System alert</p>
                                        <p class="text-xs text-gray-500">1 hour ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Users Section -->
            <div id="users-section" class="section-content hidden">
                <header class="bg-white shadow">
                    <div class="px-6 py-4 flex items-center justify-between">
                        <h1 class="text-2xl font-semibold text-gray-900">User Management</h1>
                        <div class="flex items-center space-x-4">
                            <button class="!rounded-button bg-custom text-white px-4 py-2">
                                <i class="fas fa-plus mr-2"></i>Add New User
                            </button>
                        </div>
                    </div>
                </header>

                <div class="p-6">
                    <!-- Search and Filter Section -->
                    <div class="bg-white rounded-lg shadow mb-6">
                        <div class="p-4 flex flex-wrap gap-4 items-center justify-between">
                            <div class="flex-1 min-w-[200px]">
                                <div class="relative">
                                    <input type="text" placeholder="Search users..."
                                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:ring-custom focus:border-custom">
                                    <i
                                        class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <select
                                    class="border border-gray-300 rounded-md px-4 py-2 focus:ring-custom focus:border-custom">
                                    <option>All Status</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                    <option>Banned</option>
                                </select>
                                <select
                                    class="border border-gray-300 rounded-md px-4 py-2 focus:ring-custom focus:border-custom">
                                    <option>Sort By</option>
                                    <option>Newest</option>
                                    <option>Oldest</option>
                                    <option>Most Active</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Users Table -->
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        User</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Role</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Last Active</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Games Owned</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Sample User Row -->
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img class="h-10 w-10 rounded-full"
                                                src="https://ui-avatars.com/api/?name=John+Doe" alt="">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">John Doe</div>
                                                <div class="text-sm text-gray-500">john@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">Admin</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2 minutes ago</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">45</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button class="text-custom hover:text-custom-600 mr-3" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-yellow-600 hover:text-yellow-900 mr-3" title="Ban">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Add more user rows as needed -->
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            <div class="flex items-center justify-between">
                                <div class="flex-1 flex justify-between sm:hidden">
                                    <a href="#"
                                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Previous</a>
                                    <a href="#"
                                        class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Next</a>
                                </div>
                                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                    <div>
                                        <p class="text-sm text-gray-700">
                                            Showing <span class="font-medium">1</span> to <span
                                                class="font-medium">10</span> of <span class="font-medium">97</span>
                                            results
                                        </p>
                                    </div>
                                    <div>
                                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                                            aria-label="Pagination">
                                            <a href="#"
                                                class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                                <span class="sr-only">Previous</span>
                                                <i class="fas fa-chevron-left"></i>
                                            </a>
                                            <a href="#"
                                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</a>
                                            <a href="#"
                                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</a>
                                            <a href="#"
                                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</a>
                                            <a href="#"
                                                class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                                <span class="sr-only">Next</span>
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Games Section -->
            <div id="games-section" class="section-content hidden">
                <header class="bg-white shadow">
                    <div class="px-6 py-4 flex items-center justify-between">
                        <h1 class="text-2xl font-semibold text-gray-900">Game Management</h1>
                        <div class="flex items-center space-x-4">
                            <a href="/add-game">
                                <button class="!rounded-button bg-custom text-white px-4 py-2">
                                    <i class="fas fa-plus mr-2"></i>Add New Game
                                </button>
                            </a>
                        </div>
                    </div>
                </header>

                <div class="p-6">
                    <!-- Search and Filter Section -->
                    <div class="bg-white rounded-lg shadow mb-6">
                        <div class="p-4 flex flex-wrap gap-4 items-center justify-between">
                            <div class="flex-1 min-w-[200px]">
                                <div class="relative">
                                    <input type="text" placeholder="Search games..."
                                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:ring-custom focus:border-custom">
                                    <i
                                        class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <select
                                    class="border border-gray-300 rounded-md px-4 py-2 focus:ring-custom focus:border-custom">
                                    <option>All Genres</option>
                                    <option>Action</option>
                                    <option>Adventure</option>
                                    <option>RPG</option>
                                    <option>Strategy</option>
                                    <option>Sports</option>
                                </select>
                                <select
                                    class="border border-gray-300 rounded-md px-4 py-2 focus:ring-custom focus:border-custom">
                                    <option>Sort By</option>
                                    <option>Newest</option>
                                    <option>Oldest</option>
                                    <option>Most Popular</option>
                                    <option>Price: Low to High</option>
                                    <option>Price: High to Low</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6"
                        id="games-grid">
                        @foreach ($games as $index => $game)
                            <div class="game-card bg-white rounded-lg shadow overflow-hidden flex flex-col"
                                style="{{ $index >= 4 ? 'display: none;' : '' }}">
                                <div class="relative">
                                    <img class="h-48 w-full object-cover" src="{{ $game->cover }}"
                                        alt="{{ $game->gameTitle }}">
                                    <div
                                        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-4">
                                        <div class="flex justify-between items-center">
                                            <span class="text-white font-semibold">{{ $game->price }}$</span>
                                            <div class="flex items-center">
                                                <i class="fas fa-star text-yellow-400 text-sm"></i>
                                                <span class="ml-1 text-white text-sm">{{ $game->rating }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 flex-grow">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $game->gameTitle }}</h3>
                                    <div class="text-xs text-gray-500 mb-2">Released: {{ $game->release }}</div>
                                    <div class="flex flex-wrap gap-1 mb-3">
                                        @foreach ($game->genres as $genre)
                                            <span
                                                class="px-2 py-1 text-xs font-medium rounded bg-blue-100 text-blue-800">{{ $genre->genre }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 px-4 py-3 bg-gray-50">
                                    <div class="flex items-center">
                                        <form action="{{ Route('edit-game', $game->id) }}" method="post">
                                            @csrf
                                            @method('GET')
                                            <button class="text-blue-600 hover:text-yellow-900 mr-3 cursor-pointer"
                                                title="edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </form>
                                        <button class="text-yellow-600 hover:text-yellow-900 mr-3 cursor-pointer"
                                            title="Promote">
                                            <i class="fas fa-award"></i>
                                        </button>
                                        <form action="{{ Route('admin.games.destroy', $game->id) }}" method="POST"
                                            class="inline m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900 cursor-pointer" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex justify-center items-center mt-8">
                        <button id="show-more"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-plus-circle mr-2"></i>
                            Show More Games
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function showSection(sectionName) {

            document.querySelectorAll('.section-content').forEach(section => {
                section.classList.add('hidden');
            });


            document.getElementById(`${sectionName}-section`).classList.remove('hidden');


            document.querySelectorAll('.nav-link').forEach(link => {
                if (link.dataset.section === sectionName) {
                    link.classList.add('bg-custom', 'text-white');
                    link.classList.remove('text-gray-300');
                } else {
                    link.classList.remove('bg-custom', 'text-white');
                    link.classList.add('text-gray-300');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const activityChart = echarts.init(document.getElementById('activityChart'));
            const option = {
                animation: false,
                tooltip: {
                    trigger: 'axis'
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    boundaryGap: false,
                    data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                },
                yAxis: {
                    type: 'value'
                },
                series: [{
                    name: 'Active Users',
                    type: 'line',
                    data: [820, 932, 901, 934, 1290, 1330, 1320],
                    smooth: true,
                    lineStyle: {
                        color: '#6366f1'
                    },
                    areaStyle: {
                        color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
                            offset: 0,
                            color: 'rgba(99, 102, 241, 0.3)'
                        }, {
                            offset: 1,
                            color: 'rgba(99, 102, 241, 0.1)'
                        }])
                    }
                }]
            };
            activityChart.setOption(option);
            window.addEventListener('resize', () => activityChart.resize());
        });

        let visibleCount = 4;
        const step = 4;

        document.getElementById('show-more').addEventListener('click', () => {
            const games = document.querySelectorAll('.game-card');
            let shownCount = 0;

            for (let i = 0; i < games.length; i++) {
                if (i >= visibleCount && shownCount < step) {
                    games[i].style.display = '';
                    shownCount++;
                }
            }

            visibleCount += shownCount;

            if (visibleCount >= games.length) {
                document.getElementById('show-more').style.display = 'none';
            }
        });
    </script>
</body>

</html>
