<div>
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">{{ $company_name }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/bounties">All Bounties</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/bounties/show/{{ encrypt($bountyId) }}">{{ $name }}</a>
        </li>
        <li class="breadcrumb-item">
            <span>Challenges</span>
        </li>
    </ul>

    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper" style="margin-bottom: 100px;">
                <h6 class="element-header">
                    {{ $name }} Challenges

                    <div class="btns float-right">
                        <a href="{{ route('bounties.challenges.create', ['encryptedId' => encrypt($this->bountyId)]) }}" class="btn btn-secondary">Add Challenge</a>
                    </div>
                </h6>
    
                <div class="element-box">
                    <div class="table-responsive">
                        <table class="table table-lightborder">
                            <thead>
                                <tr>
                                    <th>
                                        challenge
                                    </th>
                                    <th>
                                        description
                                    </th>
                                    <th>
                                        path
                                    </th>
                                    <th class="text-center">
                                        address
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($challenges as $challenge)
                                <tr>
                                    <td>
                                        <a
                                            href="{{ route('bounties.view', ['encryptedId' => encrypt($challenge->id)]) }}"
                                            style="color:#334152"
                                        >
                                            {{ $challenge->challenge }}
                                        </a>
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('bounties.view', ['encryptedId' => encrypt($challenge->id)]) }}"
                                            style="color:#334152"
                                        >
                                            {{ $challenge->description }}
                                        </a>
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('bounties.view', ['encryptedId' => encrypt($challenge->id)]) }}"
                                            style="color:#334152"
                                        >
                                            {{ $challenge->path }}
                                        </a>
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('bounties.view', ['encryptedId' => encrypt($challenge->id)]) }}"
                                            style="color:#334152"
                                        >
                                            {{ $challenge->address }}
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
    
                            {{ $challenges->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
