@props(['headers' => []])
<div id="table-container">
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped mb-0">
            <thead class="table-dark">
                <tr>
                    @foreach ($headers as $header)
                        <th @if ($header === 'Action') class="text-center" width="180" @endif>
                            {{ $header }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>
