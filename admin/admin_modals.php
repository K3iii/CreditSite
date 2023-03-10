<?php for ($i = 0; $i < count($allPayment['arr']); $i++) : ?>
<div id="P-<?php echo $allPayment['arr'][$i]['payment_id']; ?>" tabindex="-1" aria-hidden="true"
    class="fixed Allpayment top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full bg-black/80">
    <div class="relative mx-auto w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Your receipt for amount
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white close-payment"
                    data-modal-toggle="defaultModal1">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <img src="../<?php echo $allPayment['arr'][$i]['receipt']; ?>" alt="No Image" srcset="">
            </div>
        </div>
    </div>
</div>
<?php endfor; ?>

<div id="Add_Balance" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4  overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full bg-black/80">
    <div class="relative w-full h-full max-w-md m-auto md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add Balance
                </h3>
                <button type="button"
                    class="bal-close text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form action="../includes/add_balance.inc.php" method="post">
                    <div class="my-2">
                        <label for="add_bal_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose Name</label>
                        <select name="add_bal_name" id=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                            required>
                            <option value="" selected>-- Choose --</option>
                            <?php
                            $balUsers = $getTable->adBalUser();
                            foreach ($balUsers['arr'] as $row) :
                            ?>
                            <option value="<?php echo $row['user_id']; ?>"><?php echo $row['name']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mt-2">
                        <label for="input_bal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">How
                            much do you want to add?</label>
                        <input type="number" name="input_bal" id=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Enter number only" required>
                    </div>
                    <div class="mt-4 flex justify-end w-full">
                        <button class="p-2 rounded-md bg-teal-500 hover:bg-teal-800" type="submit"
                            name="add_bal">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>