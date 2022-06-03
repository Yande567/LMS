<?php

namespace App\Http\Controllers\Books;

use App\Models\IssueHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreIssueHistoryRequest;
use App\Http\Requests\UpdateIssueHistoryRequest;

class IssueHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();

            if($user->role_id == 1){

                $issue_history = DB::table('issue_histories')->where('status', '=','Issued')
                                    ->orderby('id', 'desc')
                                    ->get();

                return view('Admin.view_issued_books', compact('issue_history'));
            } elseif($user->role_id == 2){
                $issue_history = DB::table('issue_histories')->orderby('id', 'desc')
                                    ->get();
                                    
                return view('Librarian.view_issued_books', compact('issue_history'));
            } else{
                abort(403);
            }

        } else{
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            $user = Auth::user();

            if($user->role_id == 1){
                return view('Admin.issuing_books');

            } elseif($user->role_id == 2){
                return view('Librarian.issuing_books');

            } else{
                abort(403);
            }

        } else{
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIssueHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIssueHistoryRequest $request)
    {
        $rules = [
            'student_id' => ['required', 'string', 'max:10', 'min:10', 'exists:students,student_id'],
            'book_id' => ['required', 'numeric', 'min:1', 'exists:books,id'],
            'status' => ['required', 'string', 'max:10'],
            'return_date' => ['required', 'date_format:Y/m/d', 'after:now()']
        ];
         
        // Check if a User is Authenticated
        if(Auth::check()){
            $user = Auth::user();

            // Check if user is allowed to access the page
            if( !($user->role_id == 1 || $user->role_id ==2) ){
                abort(403);
            }else{

                //validate inputs from request
                $validator = Validator::make($request->all(), $rules);
                
                if($validator->fails()) {
                    // If validation fails return back with validation error messages
                    return redirect()->back()->withErrors($validator)->withInput();
                } else { //if validation is successful

                    // Get Number of Availible Copies
                    $copies = DB::table('book_statuses')->select('number_of_availible_copies')
                                ->where('book_id', $request->book_id)
                                ->get();
                   // Check if Their are Enough Copies To Lend Out
                    if( !($copies[0]->number_of_availible_copies > 1)) {

                        return redirect()->back()->withErrors(['msg' => 'Max Limit Has Already Been Reached'])->withInput();
                        
                     } else {
                         //Get User
                        $user = DB::table('students')
                                ->where('student_id', $request->student_id)
                                ->get();

                        $status1 = 'Returned';
                        $status2 = 'Issued';

                        if($request->status == $status2){
                             // Update Issue History
                            $history = IssueHistory::create([
                                'user_id' => $user[0]->user_id,
                                'book_id' => $request->book_id,
                                'status' => $request->status,
                                'issue_date' => now(),
                                'return_date' => $request->return_date,
                            ]);

                            // Update The Number of Availible Copies
                            $update_book = DB::table('book_statuses')->where('book_id', $request->book_id)
                                            ->decrement('number_of_availible_copies', 1);

                            return Redirect::back()->withErrors(['msg' => 'Book Issued Succesfully']);
                        }else{
                            $user = DB::table('students')
                                    ->where('student_id', $request->student_id)
                                    ->get();

                            $update_history = DB::table('issue_histories')->where([
                                ['book_id', $request->book_id],
                                ['user_id', $user[0]->user_id],
                                ['status', $status2],
                            ])->update(
                                ['status' => $status1],
                                ['return_date' => now()],
                            );

                            // Update The Number of Availible Copies
                            $update_book = DB::table('book_statuses')->where('book_id', $request->book_id)
                                            ->increment('number_of_availible_copies', 1);
                            
                            return redirect()->back()->withErrors(['msg'=>'Book Returned Succesfully']);
                        }
                    
                       
                    }

                        
                }

            }
        } else{
            return redirect('/login');
        }
    }

    public function displayStudentHistory(Request $request){
        if(Auth::check()){
            $user = Auth::id();

            // Query to retrieve Data
            $history = DB::table('issue_histories')->where('user_id', $user)
                        ->orderBy('status', 'desc')->get();

            return view('Students.borrowing_history', compact('history'));

        } else{
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IssueHistory  $issueHistory
     * @return \Illuminate\Http\Response
     */
    public function show(IssueHistory $issueHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IssueHistory  $issueHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(IssueHistory $issueHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIssueHistoryRequest  $request
     * @param  \App\Models\IssueHistory  $issueHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIssueHistoryRequest $request, IssueHistory $issueHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IssueHistory  $issueHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(IssueHistory $issueHistory)
    {
        //
    }
}
