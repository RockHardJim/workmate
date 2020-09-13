<div>
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">{{ $company_name }}</a>
        </li>
        <li class="breadcrumb-item">
            <span>All Bounties</span>
        </li>
    </ul>

    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper" style="margin-bottom: 100px;">
                <h6 class="element-header">
                    All Bounties
                </h6>

                <div class="element-box">
                    <h5 class="form-header">
                        Welcome to the bounty list.
                    </h5>
                    <div class="form-desc">
                        This bounty list includes both complete and incomplete bounties.  
                    </div>
                    <div class="table-responsive">
                        <table class="table table-lightborder">
                            <thead>
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th class="text-center">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bounties as $bounty)
                                <tr>
                                    <td>
                                        <a
                                            href="{{ route('bounties.view', ['encryptedId' => encrypt($bounty->id)]) }}"
                                            style="color:#334152"
                                        >
                                            {{ $bounty->name }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <div
                                            class="status-pill {{ $bounty->value == 100 ? 'yellow' : 'green'}}"
                                            data-title="{{ $bounty->value == '100' ? 'Pending' : 'Complete' }}"
                                            data-toggle="tooltip"
                                            data-original-title=""
                                            title=""
                                        ></div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                            {{ $bounties->links() }}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
