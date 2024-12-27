<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\accounts;


class AccountController extends Controller
{
    public function account_ac(Request $request)
    {
        // Validate the accountName
        $request->validate([
            'accountName' => 'required|string',
        ]);

        // Fetch the account based on accountName
        $account = accounts::where('accountName', $request->input('accountName'))->first();

        // If account not found, return a response with error
        if (!$account) {
            return response()->json(['message' => 'Account not found'], 404);
        }

        // Return all account details as JSON
        return response()->json([
            'accountName' => $account->accountName,
            'fullName' => $account->fullName,
            'accountAbout' => $account->accountAbout,
            'accountSkills' => $account->accountSkills,
            'accountCurrentJob' => $account->accountCurrentJob,
            'accountDesiredRoles' => $account->accountDesiredRoles,
            'accountPreferedLocation' => $account->accountPreferedLocation,
            'accountSalary' => $account->accountSalary,
            'accountPhone' => $account->accountPhone,
            'accountEmail' => $account->accountEmail,
            'accountAddress' => $account->accountAddress,
            'accountLink_portfolio' => $account->accountLink_portfolio,
            'accountLink_linkedin' => $account->accountLink_linkedin,
            'accountLink_twitter' => $account->accountLink_twitter,
            'accountLink_github' => $account->accountLink_github,
            'accountLink_facebook' => $account->accountLink_facebook,
        ]);
    }


    public function account_navibar(Request $request)
    {
        $validatedData = $request->validate([
            'accountName' => 'required|string|max:255',
            'accountPassword' => 'required|string|max:255',
        ]);
    
        // Find the account by the account name
        $account = accounts::where('accountName', $validatedData['accountName'])->first();
    
        // Check if account exists and password matches
        if ($account && Hash::check($validatedData['accountPassword'], $account->accountPassword)) {
            return response()->json('account true', 200);
        } else {
            return response()->json('account false', 200);
        }
    }
    
    public function account_dangNhap(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'accountName' => 'required|string',
            'accountPassword' => 'required|string',
        ]);

        // Retrieve accountName and accountPassword from the request
        $accountName = $request->input('accountName');
        $accountPassword = $request->input('accountPassword');

        // Find the account by accountName
        $account = accounts::where('accountName', $accountName)->first();

        // Check if the account exists
        if (!$account) {
            return response()->json('account false', 200); // Return 'account false' if accountName doesn't exist
        }

        // Verify if the provided password matches the stored password
        if (Hash::check($accountPassword, $account->accountPassword)) {
            // If passwords match, return 'account true'
            return response()->json('account true', 200);
        } else {
            // If passwords don't match, return 'account false'
            return response()->json('account false', 200);
        }
    }

    public function account_dangKy(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:accounts,accountEmail|max:255',
            'password' => 'required|string|min:6|max:255',
        ]);

        // Create a new account instance and save it to the database
        $newAccount = accounts::create([
            'accountName' => $validatedData['name'], // Saving "name" as "accountName"
            'accountPassword' => bcrypt($validatedData['password']), // Encrypt the password
            'accountEmail' => $validatedData['email'], // Save email as accountEmail
        ]);

        // Return a success response
        return response()->json(['message' => 'Account registered successfully!'], 201);
    }

    public function account_registering(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'fullName' => 'required|string|max:255',
            'accountAbout' => 'nullable|string|max:1000',
            'accountSkills' => 'nullable|string|max:500',
            'accountCurrentJob' => 'nullable|string|max:255',
            'accountDesiredRoles' => 'nullable|string|max:255',
            'accountPreferedLocation' => 'nullable|string|max:255',
            'accountSalary' => 'nullable|string|max:50',
            'accountPhone' => 'nullable|string|max:15',
            'accountAddress' => 'nullable|string|max:255',
            'accountLink_portfolio' => 'nullable|string|max:500',
            'accountLink_linkedin' => 'nullable|string|max:500',
            'accountLink_twitter' => 'nullable|string|max:500',
            'accountLink_github' => 'nullable|string|max:500',
            'accountLink_facebook' => 'nullable|string|max:500',
            'accountName' => 'required|string',
        ]);
    
        // Get accountName from the cookie
        $accountName = $request->input('accountName');
    
        if (!$accountName) {
            return response()->json([
                'success' => false,
                'message' => 'Account name not found in the cookie.',
            ], 402);
        }
    
        // Fetch the first row in the database that matches accountName
        $account = accounts::where('accountName', $accountName)->first();
    
        if (!$account) {
            return response()->json([
                'success' => false,
                'message' => 'Account not found in the database.',
            ], 404);
        }
    
        // Update the row with the validated data
        $account->update([
            'fullName' => $validatedData['fullName'],
            'accountAbout' => $validatedData['accountAbout'] ?? $account->accountAbout,
            'accountSkills' => $validatedData['accountSkills'] ?? $account->accountSkills,
            'accountCurrentJob' => $validatedData['accountCurrentJob'] ?? $account->accountCurrentJob,
            'accountDesiredRoles' => $validatedData['accountDesiredRoles'] ?? $account->accountDesiredRoles,
            'accountPreferedLocation' => $validatedData['accountPreferedLocation'] ?? $account->accountPreferedLocation,
            'accountSalary' => $validatedData['accountSalary'] ?? $account->accountSalary,
            'accountPhone' => $validatedData['accountPhone'] ?? $account->accountPhone,
            'accountAddress' => $validatedData['accountAddress'] ?? $account->accountAddress,
            'accountLink_portfolio' => $validatedData['accountLink_portfolio'] ?? $account->accountLink_portfolio,
            'accountLink_linkedin' => $validatedData['accountLink_linkedin'] ?? $account->accountLink_linkedin,
            'accountLink_twitter' => $validatedData['accountLink_twitter'] ?? $account->accountLink_twitter,
            'accountLink_github' => $validatedData['accountLink_github'] ?? $account->accountLink_github,
            'accountLink_facebook' => $validatedData['accountLink_facebook'] ?? $account->accountLink_facebook,
        ]);
    
        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'Account updated successfully!',
        ], 200);
    }

    public function account_thongTinChung(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'accountName' => 'required|string',
            'fullName' => 'nullable|string',
            'accountAbout' => 'nullable|string',
            'accountSkills' => 'nullable|string',
            'accountCurrentJob' => 'nullable|string',
            'accountDesiredRoles' => 'nullable|string',
            'accountPreferedLocation' => 'nullable|string',
            'accountSalary' => 'nullable|string',
            'accountPhone' => 'nullable|string',
            'accountEmail' => 'nullable|email',
            'accountAddress' => 'nullable|string',
            'accountLink_portfolio' => 'nullable|string',
            'accountLink_linkedin' => 'nullable|string',
            'accountLink_twitter' => 'nullable|string',
            'accountLink_github' => 'nullable|string',
            'accountLink_facebook' => 'nullable|string',
        ]);
    
        // Attempt to find and update the account by account_name
        $account = DB::table('accounts') // Adjust 'accounts' to your actual table name
            ->where('accountName', $validatedData['accountName'])
            ->update([
                'fullName' => $validatedData['fullName'],
                'accountAbout' => $validatedData['accountAbout'],
                'accountSkills' => $validatedData['accountSkills'],
                'accountCurrentJob' => $validatedData['accountCurrentJob'],
                'accountDesiredRoles' => $validatedData['accountDesiredRoles'],
                'accountPreferedLocation' => $validatedData['accountPreferedLocation'],
                'accountSalary' => $validatedData['accountSalary'],
                'accountPhone' => $validatedData['accountPhone'],
                'accountEmail' => $validatedData['accountEmail'],
                'accountAddress' => $validatedData['accountAddress'],
                'accountLink_portfolio' => $validatedData['accountLink_portfolio'],
                'accountLink_linkedin' => $validatedData['accountLink_linkedin'],
                'accountLink_twitter' => $validatedData['accountLink_twitter'],
                'accountLink_github' => $validatedData['accountLink_github'],
                'accountLink_facebook' => $validatedData['accountLink_facebook'],
            ]);
    
        if ($account) {
            return response()->json(['message' => 'Account updated successfully!'], 200);
        } else {
            return response()->json(['message' => 'Account not found or no changes made.'], 404);
        }
    }

    public function account_doiMatKhau(Request $request)
    {
        // Step 1: Validate the input
        $validatedData = $request->validate([
            'accountName' => 'required|string',
            'currentPassword' => 'required|string',
            'newPassword' => 'required|string|min:6', // Ensure the new password is secure
        ]);
    
        // Step 2: Retrieve the account from the database
        $account = DB::table('accounts')->where('accountName', $validatedData['accountName'])->first();
    
        if (!$account) {
            return response()->json(['message' => 'Tài khoản không tồn tại.'], 404);
        }
    
        // Step 3: Check if the current password matches
        if (!Hash::check($validatedData['currentPassword'], $account->accountPassword)) {
            return response()->json(['message' => 'Mật khẩu hiện tại không đúng.'], 201);
        }
    
        // Step 4: Update the password in the database
        $hashedNewPassword = Hash::make($validatedData['newPassword']); // Hash the new password
        DB::table('accounts')
            ->where('accountName', $validatedData['accountName'])
            ->update(['accountPassword' => $hashedNewPassword]);
    
        return response()->json(['message' => 'Mật khẩu đã được cập nhật thành công.'], 200);
    }
}
